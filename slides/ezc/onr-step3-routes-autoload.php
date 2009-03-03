<?xml version="1.0" encoding="utf-8"?>
<slide>
    <title>Step 2: Adding authentication</title>
    <subtitle>New routes and autoload entries</subtitle>

    <blurb>%lib/router.php%:</blurb>
<example><![CDATA[<?php
class onrRouter extends ezcMvcRouter
{
    public function createRoutes()
    {
        return array(
            // Recipes
            new ezcMvcRailsRoute( '/recipes', 'onrRecipeController', 'list' ),
            new ezcMvcRailsRoute( '/recipe/list', 'onrRecipeController', 'list' ),
            new ezcMvcRailsRoute( '/recipe/:id', 'onrRecipeController', 'view' ),
            new ezcMvcRailsRoute( '/recipe/add', 'onrRecipeController', 'add' ),
        );
    }
}]]></example>

    <blurb>%lib/autoload/autoload.php%:</blurb>
<example><![CDATA[<?php
return array(
    'onrAuthController'   => 'controllers/auth.php',
	'onrRecipeController' => 'controllers/recipe.php',
);
?>]]></example>
</slide>
