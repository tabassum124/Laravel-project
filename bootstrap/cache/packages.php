<?php return array (
  'arrilot/laravel-widgets' => 
  array (
    'providers' => 
    array (
      0 => 'Arrilot\\Widgets\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'Widget' => 'Arrilot\\Widgets\\Facade',
      'AsyncWidget' => 'Arrilot\\Widgets\\AsyncFacade',
    ),
  ),
  'facade/ignition' => 
  array (
    'providers' => 
    array (
      0 => 'Facade\\Ignition\\IgnitionServiceProvider',
    ),
    'aliases' => 
    array (
      'Flare' => 'Facade\\Ignition\\Facades\\Flare',
    ),
  ),
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'fruitcake/laravel-cors' => 
  array (
    'providers' => 
    array (
      0 => 'Fruitcake\\Cors\\CorsServiceProvider',
    ),
  ),
  'hardevine/shoppingcart' => 
  array (
    'providers' => 
    array (
      0 => 'Gloudemans\\Shoppingcart\\ShoppingcartServiceProvider',
    ),
    'aliases' => 
    array (
      'Cart' => 'Gloudemans\\Shoppingcart\\Facades\\Cart',
    ),
  ),
  'intervention/image' => 
  array (
    'providers' => 
    array (
      0 => 'Intervention\\Image\\ImageServiceProvider',
    ),
    'aliases' => 
    array (
      'Image' => 'Intervention\\Image\\Facades\\Image',
    ),
  ),
  'larapack/doctrine-support' => 
  array (
    'providers' => 
    array (
      0 => 'Larapack\\DoctrineSupport\\DoctrineSupportServiceProvider',
    ),
  ),
  'laravel/legacy-factories' => 
  array (
    'providers' => 
    array (
      0 => 'Illuminate\\Database\\Eloquent\\LegacyFactoryServiceProvider',
    ),
  ),
  'laravel/scout' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Scout\\ScoutServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'laravel/ui' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Ui\\UiServiceProvider',
    ),
  ),
  'meilisearch/meilisearch-laravel-scout' => 
  array (
    'providers' => 
    array (
      0 => 'Meilisearch\\Scout\\MeilisearchServiceProvider',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
  'tcg/voyager' => 
  array (
    'providers' => 
    array (
      0 => 'TCG\\Voyager\\VoyagerServiceProvider',
      1 => 'TCG\\Voyager\\Providers\\VoyagerDummyServiceProvider',
    ),
  ),
);