

 <!-- Plugin to provide expanded sections -->
<script src="js/colio.min.js" type="text/javascript"></script>
<!-- Plugin to perform filtering and sorting -->
<script src="js/isotope.min.js" type="text/javascript"></script>
<!-- Plugin to check when images are loaded -->
<script src="js/imagesloaded.js" type="text/javascript"></script>

<script type="text/javascript">

    // document.ready shorhand
    $(function() {
        // Initialise Isotope
        var isoOptions = {
            layoutMode: 'fitRows',
            itemSelector: '.isotopeTrigger',
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        };

        var $grid = $('.colioTarget').isotope(isoOptions);

        // Initialise colio plugin
        list = $('.colioTarget').colio({
            id: 'colio_1',
            placement: 'inside',
            hiddenItems: '.isotope-hidden',
            onExpand: function(content) {

                var pageType = $('#mainContent').attr('data-sdetype');

                if (pageType == 'colio-hero-graph') {

                var url = 'data/';
                var query = 'heroes.json';

                    $.getJSON(url + query, function(data) {

                        // return active colio element ID
                        var colioID = $('.colioTarget').find('.colio-active-item').attr('id');

                        // filter JSON by character ID
                        var as = $(data.heroesString).filter(function(index) {
                            return data.heroesString[index].ID === colioID;
                        });

                        $(function() {

                            // load up character ID
                            var chartID = as[0].ID;

                            // load up stats
                            var p1 = as[0].Stat_Offense;
                            var p2 = as[0].Stat_Healing;
                            var p3 = as[0].Stat_Support;
                            var p4 = as[0].Stat_Control;
                            var p5 = as[0].Stat_Mobility;
                            var p6 = as[0].Stat_Defense;

                            var data = {
                                labels: ["Offense", "Healing", "Support", "Control", "Mobility", "Defense"],
                                datasets: [{
                                    label: "My First dataset",
                                    fillColor: "rgba(66, 133, 244,0.5)",
                                    strokeColor: "rgb(23, 105, 170)",
                                    pointColor: "rgb(23, 105, 170)",
                                    pointStrokeColor: "rgb(23, 105, 170)",
                                    pointHighlightFill: "rgba(55, 58, 60, 1)",
                                    pointHighlightStroke: "rgba(55, 58, 60, 1)",
                                    data: [p1, p2, p3, p4, p5, p6]
                                }]
                            };

                            var charname = as[0].Name_Long;

                            var option = {
                                responsive: true,
                            };

                            // Get the context of the canvas element we want to select
                            var ctx = document.getElementById("charChart_" + chartID).getContext('2d');

                            //'Line' defines type of the chart.
                            var myLineChart = new Chart(ctx).Radar(data, option);
                        });
                    });
                    // end if statement
                };

                // Fade non-selected icons
                $(".colio-item").css({
                    "opacity": "0.5"
                });
                // fix colour of active item
                $(".colio-active-item").css({
                    "opacity": "1"
                });
                // re-initialise tool-tips
                $('[data-toggle="tooltip"]').tooltip();

            },
            onCollapse: function(content) {
                // restore opacity
                $(".colio-item").css({
                    "opacity": "1"
                });
                // GA Event
                // ga('send', 'event', 'Generic', 'Colio-collapse', '');
            },
            onContent: function(content) {
                window.setTimeout(function() {
                    $(content).imagesLoaded(function() {
                        $(window).trigger('orientationchange');
                    });
                }, 500);
            }
        });

        var finalFilters = [];

        // Build the filter array from the selects.
        function createFilterArray() {
            var filters = [];
            finalFilters = []; // reset the array
            var selectId = 0;
            $('#filters select').each(function(sCount, select) {
                if ($(select).find('option:selected').length > 0) {
                    if (filters[selectId] === undefined) {
                        filters[selectId] = [];
                    }
                    $(select).find('option:selected').each(function(fCount, filter) {
                        filters[selectId].push($(filter).val());
                    });
                    selectId++;
                }
            });
            if (filters.length > 1) {
                for (var i = 0; i < filters.length; i++) {
                    if (i === 0) {
                        finalFilters = filters[i];
                    } else {
                        finalFilters = combineArrays(finalFilters, filters[i]);
                    }
                }
            } else if (filters.length == 1) {
                finalFilters = filters[0];
            }
        }

        function filterStuff(htmlItem) {
            var characterCard = $(htmlItem).find('a.colioTmp');
            var name = $(characterCard).prop('text');
            // console.log(htmlItem);
            var classes = $(characterCard).closest('.charProfile').prop('class').trim().split(' ');
            var classMatch = false;
            // match on the name, and check the filter classes.
            if (name.match(new RegExp($('#filters #searchFilter').val(), 'gi')) || $('#filters #searchFilter').val() === '') {
                $.each(finalFilters, function(index, item) {
                    if (!classMatch) {
                        var matchCount = 0;
                        var filterClasses = item.substring(1).split('.');
                        for (var i = 0; i < filterClasses.length; i++) {
                            var matchFound = false;
                            for (var j = 0; j < classes.length; j++) {
                                if (classes[j] == filterClasses[i]) {
                                    matchFound = true;
                                }
                            }
                            if (matchFound) {
                                matchCount++;
                            }
                        }
                        //   console.log("matchCount=" + matchCount + " filterClasses=" + filterClasses.length);
                        if (matchCount == filterClasses.length) {
                            //  console.log("true");
                            classMatch = true;
                        }
                    }
                });
                // If there are no filters, just match on the name
                if ((finalFilters.length === 0 || finalFilters[0] === '') && name.match(new RegExp($('#filters #searchFilter').val(), 'gi')))
                    classMatch = true;
            }
            return classMatch;
        }

        // dev item
        function getHashFilter() {
            var hash = location.hash;
            // get filter=filterName
            var matches = location.hash.match(/filter=([^&]+)/i);
            var hashFilter = matches && matches[1];
            return hashFilter && decodeURIComponent(hashFilter);
        }

        // when search box change
        $('#filters #searchFilter').on('keyup', function() {
            $grid.isotope({
                filter: function() {
                    var filterContents = filterStuff($(this));
                    //        console.log(filterContents);

                    // GA Event
                    ga('send', 'event', 'colio-filter', 'terms', filterContents);

                    return filterContents;
                }
            }).trigger('colio', 'excludeHidden');
        });

        // when filter menus change
        $('#filters select').on('change', function() {
            createFilterArray();
            $grid.isotope({
                filter: function() {
                    var filterContents = filterStuff($(this));
                    // console.log(filterContents);

                    // GA Event
                    ga('send', 'event', 'colio-filter', 'terms', filterContents);

                    return filterContents;
                }
            }).trigger('colio', 'excludeHidden');
        });


        function combineArrays(array1, array2) {
            var newArray = [];
            for (var i = 0; i < array1.length; i++) {
                for (var j = 0; j < array2.length; j++) {
                    newArray.push(array1[i] + array2[j]);
                }
            }
            return newArray;
        }
    });
</script>

<script type="text/javascript">
    // Material Select Initialization
    $('.mdb-select').material_select();

</script>

<script type="text/javascript">
    // Init Bootstrap Tooltips (displays on hover)
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<script type="text/javascript">
    // Press Esc to close colio
    // evt.key = modern browsers, keycode for less modern browsers
    document.onkeydown = function(evt) {
        evt = evt || window.event;
        var isEscape = false;
        if ("key" in evt) {
            isEscape = (evt.key == "Escape" || evt.key == "Esc");
        } else {
            isEscape = (evt.keyCode == 27); // escape key
        }
        if (isEscape) {
            $('.colioTarget').trigger("colio", "collapse");
        }
    };
</script>

<script type="text/javascript">
    // Add class to items filtered by Isotope
    var itemReveal = Isotope.Item.prototype.reveal;
    Isotope.Item.prototype.reveal = function() {
        itemReveal.apply(this, arguments);
        $(this.element).removeClass('isotope-hidden');
    };
    var itemHide = Isotope.Item.prototype.hide;
    Isotope.Item.prototype.hide = function() {
        itemHide.apply(this, arguments);
        $(this.element).addClass('isotope-hidden');
    };
</script>
