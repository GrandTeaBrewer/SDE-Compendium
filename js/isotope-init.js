$(function() {

		//  All filter option controls
		$("input:checkbox.all").change(function() {
        if ($('input[name=charFilterAll]:checked').length) {
            $('input[name=charFilter]').removeAttr('checked');
        }
				if ($('input[name=retailFilterAll]:checked').length) {
						$('input[name=retailFilter]').removeAttr('checked');
				}
				if ($('input[name=packageFilterAll]:checked').length) {
						$('input[name=packageFilter]').removeAttr('checked');
				}
    });

		// Any charFilter checked
    $("input[name=charFilter]:checkbox").change(function() {
        if ($('input[name=charFilter]:checked').length) {
            $('input[name=charFilterAll]').prop("checked", false);
        } else {
            $('input[name=charFilterAll]').prop("checked", true);
        }
    });

		// Any retailFilter checked
    $("input[name=retailFilter]:checkbox").change(function() {
        if ($('input[name=retailFilter]:checked').length) {
            $('input[name=retailFilterAll]').prop("checked", false);
        } else {
            $('input[name=retailFilterAll]').prop("checked", true);
        }
    });

		// Any packageFilter checked
    $("input[name=packageFilter]:checkbox").change(function() {
        if ($('input[name=packageFilter]:checked').length) {
            $('input[name=packageFilterAll]').prop("checked", false);
        } else {
            $('input[name=packageFilterAll]').prop("checked", true);
        }
    });
});

var $container;
var filters = {};

$(function() {

    var qsRange;
    var qsRegex;
    $container = $('.charFilter');

    var $grid = $('.charFilter').isotope({
        layoutMode: 'fitRows'
    });

    var $filterDisplay = $('#filter-display');

    var comboFilter = getComboFilter(filters);

    //preLoadHashFilters();
    var hash = location.hash.slice(1),
        hashParts = hash.split('&search:'),
        hashFilters = [],
        hashSearch = hashParts[1] || '';

    hashParts[0]
        .split(',')
        .filter(function(item) {
            return $.trim(item) !== '';
        })
        .forEach(function(item) {
            var classes = $.trim(item).split('.').filter(function(item) {
                return item !== '';
            });
            classes.forEach(function(item) {
                if (hashFilters.indexOf(item) == -1) {
                    hashFilters.push(item);
                }
            });
        });

    if (hashSearch !== '' || hashFilters.length) {
        $('#options').find(':checkbox').filter(function(index, item) {
            return hashFilters.indexOf(item.value.slice(1)) > -1;
        }).prop('checked', true);
    }

    $container.isotope({
        filter: function() {
            var $this = $(this),
                comboResult = $this.is(comboFilter),
                searchResult = qsRange ? $(this).text().match(qsRange) : true;

            return (comboResult || comboFilter === '') && searchResult;
        }
    });

    // do stuff when checkbox change
    var $options = $('#options').on('change', function(jQEvent) {
        var $checkbox = $(jQEvent.target);
        manageCheckbox($checkbox);
        comboFilter = getComboFilter(filters);

        $container.isotope();
        setHashText(comboFilter, qsRange);
    });

    // use value of search field to filter
    var $search = $('#search').keyup(debounce(

        function() {
            qsRange = new RegExp($search.val(), 'gi');
            qsRange = qsRange;
            $container.isotope();
            setHashText(comboFilter, qsRange);
        }));

    if (hashFilters.length) {
        $options.find(':checked:not([value=""])').trigger('change');
    }
    if (hashSearch !== '') {
        $search.val(hashSearch).trigger('keyup');
    }
});


function setHashText(comboFilter, range) {
    var hash = comboFilter;
    var actual = $('#search').val();

    if (range) {
        hash += '&search:' + actual;
    }
    location.hash = hash;
    $('#filter-display').text(hash);
}


function getComboFilter(filters) {
    var i = 0;
    var comboFilters = [];
    var message = [];

    for (var prop in filters) {
        message.push(filters[prop].join(' '));
        var filterGroup = filters[prop];
        // skip to next filter group if it doesn't have any values
        if (!filterGroup.length) {
            continue;
        }
        if (i === 0) {
            // copy to new array
            comboFilters = filterGroup.slice(0);
        } else {
            var filterSelectors = [];
            // copy to fresh array
            var groupCombo = comboFilters.slice(0); // [ A, B ]
            // merge filter Groups
            for (var k = 0, len3 = filterGroup.length; k < len3; k++) {
                for (var j = 0, len2 = groupCombo.length; j < len2; j++) {
                    filterSelectors.push(groupCombo[j] + filterGroup[k]); // [ 1, 2 ]
                }

            }
            // apply filter selectors to combo filters for next group
            comboFilters = filterSelectors;
        }
        i++;
    }

    var comboFilter = comboFilters.join(', ');
    return comboFilter;
}

function manageCheckbox($checkbox) {
    var checkbox = $checkbox[0];
    var group = $checkbox.parents('.option-set').attr('data-group');

    // create array for filter group, if not there yet
    var filterGroup = filters[group];
    if (!filterGroup) {
        filterGroup = filters[group] = [];
    }

    var isAll = $checkbox.hasClass('all');

    if (isAll) {
        delete filters[group];
    }
    // index of
    var index = $.inArray(checkbox.value, filterGroup);

    if (checkbox.checked) {
        var selector = isAll ? 'input' : 'input.all';

        if (!isAll && index === -1) {
            // add filter to group
            filters[group].push(checkbox.value);
        }

    } else if (!isAll) {
        // remove filter from group
        filters[group].splice(index, 1);
    }
}

// debounce so filtering doesn't happen every millisecond
function debounce(fn, threshold) {
    var timeout;
    return function debounced() {
        if (timeout) {
            clearTimeout(timeout);
        }

        function delayed() {
            fn();
            timeout = null;
        }
        setTimeout(delayed, threshold || 100);
    };
}
