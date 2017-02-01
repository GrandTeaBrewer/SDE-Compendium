# SDE-Compendium
This site is a living library of Super Dungeon Explore character cards, hero guides, and reference material, including every retail release by Soda Pop Miniatures. Download or clone this GIT repository to run the application or access the assets used within the site.

![Alt text](/img/bg/sde-compendium-pinterest.png?raw=true "SDE Compendium homepage")

## Live site
Visit the [SDE Compendium](http://sde.invarti,com)

## Requirements
The site requires the use of a web server to function. Opening the index.php will not load the site correctly. There are many useful guides available via a Google search on how to create your own local or online web server.

## Libraries
This Application uses a number of open-source dependencies including:

- [Twitter Bootstrap](http://getbootstrap.com/)
- [jQuery](https://jquery.com/)
- [Font-Awesome](http://fontawesome.io/)
- [Isotope](http://isotope.metafizzy.co/v2/)
- [Images Loaded](https://plugins.jquery.com/imagesloaded/)

The site also uses two commercially licensed dependencies:

- [Material Design for Bootstrap (MDB)](https://mdbootstrap.com/)
- [Colio - jQuery Portfolio Content Expander](https://codecanyon.net/item/colio-jquery-portfolio-content-expander-plugin/6507310)

With the exception of MDB and Colio, the other necessary dependencies are stored within the repository. The free version of MDB can be used in place of the commercial offering, but some site functions will not oeprated as intended.

To use the free version of MDB change the following two files:

Change around line 15 of templates/common/page_head.php to the following:

.. code:: bash
    <!-- Material Design Bootstrap MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.0/css/mdb.min.css" type="text/css" rel="stylesheet">

Change around line 95 of templates/common/footer.php to the following:

.. code:: bash
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.0/js/mdb.min.js"></script>


##License
This project is completely unofficial and in no way endorsed by Ninja Division Publishing™ LLC. Super Dungeon Explore® and its respective contents are trademarks and/or copyrights of Ninja Division Publishing™ LLC. No challenge to their status intended.

All Rights Reserved to their respective owners.
