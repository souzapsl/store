# Computer Store
Shopping cart for the Computer Store

## Installation

To use this program, just clone this repository or download the zip file to your server root folder www/htdocs and access eg http://localhost/computer_store

### Composer

Some modules such as the smarty template case and twitter bootstrap were installed by the composer, to update these modules, execute: `composer update` in the root folder of this project

## Usage

To test according to the stipulated rules, just add the products in the cart normally, updating the same happens in real time and you can follow the upgrade price.

	The rules of special prices for some products are in class: `class/PricingRules.class.php`