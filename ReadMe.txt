my_portfolio.info.yml: Similar to the previous example, 
updated with autoload section specifying the src folder for autoloading.
src/Entity/PortfolioItem.php: Defines the PortfolioItem entity class 
extending ContentEntityBase. It includes code for defining base fields, 
pre-creation logic, and entity type information. This example also defines 
a field for referencing multiple images using the entity_reference 
field type and sets the target entity type to image.


src/PortfolioItem.module is optional: Similar to the previous example, 
it defines hooks for creating the "portfolio_item" bundle and avoids 
defining field information again, relying on the PortfolioItem class 
definition.