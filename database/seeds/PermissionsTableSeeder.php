<?php

use App\Permission;
use App\PermissionCategory;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_categories')->delete();
        DB::table('permissions')->delete();

        #Delete relations roles,users,permissions and assign role 1 to the user = 1
        DB::table('role_user')->delete();
        // DB::table('role_user')->insert([
        //     'role_id' => 1,
        //     'user_id' => 1,
        //   ]);
        DB::table('permission_role')->delete();
        DB::table('permission_user')->delete();
        // id=1

        $category_attribute = PermissionCategory::create([
            'name' => 'Portadas',
            'slug' => str_slug('Portadas') ,
        ]);

        Permission::create([
            'name' => str_slug('Ver modulo de portadas'),
            'display_name' => 'Ver modulo de portadas',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Nueva portada'),
            'display_name' => 'Nueva portada',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Publicar portada'),
            'display_name' => 'Publicar portada',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Editar portada'),
            'display_name' => 'Editar portada',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Eliminar portada'),
            'display_name' => 'Eliminar portada',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        $category_attribute = PermissionCategory::create([
            'name' => 'Datos generales',
            'slug' => str_slug('Datos generales'),
        ]);

        Permission::create([
            'name' => str_slug('Ver modulo datos generales'),
            'display_name' => 'Ver modulo datos generales',
            'permission_category_id' => $category_attribute->id,
            'activated' => 0,
        ]);

        Permission::create([
            'name' => str_slug('Activar Trabaja con nosotros'),
            'display_name' => 'Activar Trabaja con nosotros',
            'permission_category_id' => $category_attribute->id,
            'activated' => 0,
        ]);

        Permission::create([
            'name' => str_slug('Activar Termnos y condiciones'),
            'display_name' => 'Activar Termnos y condiciones',
            'permission_category_id' => $category_attribute->id,
            'activated' => 0,
        ]);

        Permission::create([
            'name' => str_slug('Activar Fecha de membresia'),
            'display_name' => 'Activar Fecha de membresia',
            'permission_category_id' => $category_attribute->id,
            'activated' => 0,
        ]);

        $category_attribute = PermissionCategory::create([
            'name' => 'Beneficios',
            'slug' => str_slug('Beneficios'),
        ]);

        Permission::create([
            'name' => str_slug('Ver modulo de beneficios'),
            'display_name' => 'Ver modulo de beneficios',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Nuevo beneficios'),
            'display_name' => 'Nuevo beneficios',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Publicar beneficios'),
            'display_name' => 'Publicar beneficios',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);


        Permission::create([
            'name' => str_slug('Editar beneficios'),
            'display_name' => 'Editar beneficios',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Eliminar beneficios'),
            'display_name' => 'Eliminar beneficios',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);



        $category_attribute = PermissionCategory::create([
            'name' => 'Usuarios',
            'slug' => str_slug('Usuarios'),
        ]);

        Permission::create([
            'name' => str_slug('Ver modulo de usuarios'),
            'display_name' => 'Ver modulo de usuarios',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Nuevo usuario'),
            'display_name' => 'Nuevo usuario',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Editar permisos'),
            'display_name' => 'Editar permisos',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        // Permission::create([
        //     'name' => str_slug('Activar cargo'),
        //     'display_name' => 'Activar cargo',
        //     'permission_category_id' => $category_attribute->id,
        //     'activated' => 1,
        // ]);

        // Permission::create([
        //     'name' => str_slug('Activar compañia'),
        //     'display_name' => 'Activar compañia',
        //     'permission_category_id' => $category_attribute->id,
        //     'activated' => 1,
        // ]);

        Permission::create([
            'name' => str_slug('Editar usuario'),
            'display_name' => 'Editar usuario',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Suspender usuario'),
            'display_name' => 'Suspender usuario',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Cambiar contraseña'),
            'display_name' => 'Cambiar contraseña',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Editar roles'),
            'display_name' => 'Editar roles',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Permisos adicionales'),
            'display_name' => 'Permisos adicionales',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        $category_attribute = PermissionCategory::create([
            'name' => 'Clientes',
            'slug' => str_slug('Clientes'),
        ]);

        Permission::create([
            'name' => str_slug('Ver modulo de clientes'),
            'display_name' => 'Ver modulo de clientes',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Nuevo cliente'),
            'display_name' => 'Nuevo cliente',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Exportar cliente'),
            'display_name' => 'Exportar cliente',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Editar cliente'),
            'display_name' => 'Editar cliente',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Eliminar Cliente'),
            'display_name' => 'Eliminar Cliente',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);


        $category_attribute = PermissionCategory::create([
            'name' => 'Cuentas',
            'slug' => str_slug('Cuentas'),
        ]);

        Permission::create([
            'name' => str_slug('Ver modulo de cuenta'),
            'display_name' => 'Ver modulo de cuenta',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Añadir cuenta'),
            'display_name' => 'Añadir cuenta',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Publicar cuenta'),
            'display_name' => 'Publicar cuenta',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Editar cuenta'),
            'display_name' => 'Editar cuenta',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Eliminar cuenta'),
            'display_name' => 'Eliminar cuenta',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        $category_attribute = PermissionCategory::create([
            'name' => 'Servicios',
            'slug' => str_slug('Servicios'),
        ]);

        Permission::create([
            'name' => str_slug('Ver modulo de servicios'),
            'display_name' => 'Ver modulo de servicios',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Nuevo servicio'),
            'display_name' => 'Nuevo servicio',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Publicar servicio'),
            'display_name' => 'Publicar servicio',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Editar servicio'),
            'display_name' => 'Editar servicio',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Eliminar servicio'),
            'display_name' => 'Eliminar servicio',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        $category_attribute = PermissionCategory::create([
            'name' => 'Blog',
            'slug' => str_slug('Blog'),
        ]);

        Permission::create([
            'name' => str_slug('Ver modulo de blog'),
            'display_name' => 'Ver modulo de blog',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Nueva Publicacion'),
            'display_name' => 'Nueva Publicacion',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Publicar blog'),
            'display_name' => 'Publicar blog',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Editar blog'),
            'display_name' => 'Editar blog',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Añadir imagenes al blog'),
            'display_name' => 'Añadir imagenes al blog',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Eliminar blog'),
            'display_name' => 'Eliminar blog',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);


        $category_attribute = PermissionCategory::create([
            'name' => 'Catalogo',
            'slug' => str_slug('Catalogo'),
        ]);

        Permission::create([
            'name' => str_slug('Ver modulo de catalogo'),
            'display_name' => 'Ver modulo de catalogo',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Nuevo catalogo'),
            'display_name' => 'Nuevo catalogo',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Publicar catalogo'),
            'display_name' => 'Publicar catalogo',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Editar catalogo'),
            'display_name' => 'Editar catalogo',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Eliminar catalogo'),
            'display_name' => 'Eliminar catalogo',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);


        $category_attribute = PermissionCategory::create([
            'name' => 'Fotos y videos',
            'slug' => str_slug('Fotos y videos'),
        ]);

        Permission::create([
            'name' => str_slug('Ver modulo de Fotos y Videos'),
            'display_name' => 'Ver modulo de Fotos y Videos',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Agregar Fotos'),
            'display_name' => 'Agregar Fotos',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Eliminar Fotos'),
            'display_name' => 'Eliminar Fotos',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Agregar Videos'),
            'display_name' => 'Agregar Videos',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Editar Videos'),
            'display_name' => 'Editar Videos',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Eliminar Videos'),
            'display_name' => 'Eliminar Videos',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        $category_attribute = PermissionCategory::create([
            'name' => 'Tiendas',
            'slug' => str_slug('Tiendas'),
        ]);

        Permission::create([
            'name' => str_slug('Ver modulo de Tiendas'),
            'display_name' => 'Ver modulo de Tiendas',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Nueva Tienda'),
            'display_name' => 'Nueva Tienda',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Editar Tiendas'),
            'display_name' => 'Editar Tiendas',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Eliminar Tiendas'),
            'display_name' => 'Eliminar Tiendas',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        $category_attribute = PermissionCategory::create([
            'name' => 'Configuracion',
            'slug' => str_slug('Configuracion'),
        ]);

        Permission::create([
            'name' => str_slug('Ver modulo de Configuracion'),
            'display_name' => 'Ver modulo de Configuracion',
            'permission_category_id' => $category_attribute->id,
            'activated' => 0,
        ]);

        Permission::create([
            'name' => str_slug('Ver tab de categoria'),
            'display_name' => 'Ver tab de categoria',
            'permission_category_id' => $category_attribute->id,
            'activated' => 0,
        ]);

        Permission::create([
            'name' => str_slug('Nueva categoria'),
            'display_name' => 'Nueva categoria',
            'permission_category_id' => $category_attribute->id,
            'activated' => 0,
        ]);

        Permission::create([
            'name' => str_slug('Editar categoria'),
            'display_name' => 'Editar categoria',
            'permission_category_id' => $category_attribute->id,
            'activated' => 0,
        ]);

        Permission::create([
            'name' => str_slug('Eliminar Categoria'),
            'display_name' => 'Eliminar Categoria',
            'permission_category_id' => $category_attribute->id,
            'activated' => 0,
        ]);

        Permission::create([
            'name' => str_slug('Ver tab de atributos'),
            'display_name' => 'Ver tab de atributos',
            'permission_category_id' => $category_attribute->id,
            'activated' => 0,
        ]);

        Permission::create([
            'name' => str_slug('Nuevo Atributo'),
            'display_name' => 'Nuevo Atributo',
            'permission_category_id' => $category_attribute->id,
            'activated' => 0,
        ]);

        Permission::create([
            'name' => str_slug('Editar atributo'),
            'display_name' => 'Editar atributo',
            'permission_category_id' => $category_attribute->id,
            'activated' => 0,
        ]);

        Permission::create([
            'name' => str_slug('Eliminar Atributo'),
            'display_name' => 'Eliminar Atributo',
            'permission_category_id' => $category_attribute->id,
            'activated' => 0,
        ]);

        Permission::create([
            'name' => str_slug('Ver tab de categoria de empresa'),
            'display_name' => 'Ver tab de categoria de empresa',
            'permission_category_id' => $category_attribute->id,
            'activated' => 0,
        ]);

        Permission::create([
            'name' => str_slug('Nuevo categoria de empresa'),
            'display_name' => 'Nuevo categoria de empresa',
            'permission_category_id' => $category_attribute->id,
            'activated' => 0,
        ]);


        Permission::create([
            'name' => str_slug('Editar categoria de empresa'),
            'display_name' => 'Editar categoria de empresa',
            'permission_category_id' => $category_attribute->id,
            'activated' => 0,
        ]);

        Permission::create([
            'name' => str_slug('Eliminar categoria de empresa'),
            'display_name' => 'Eliminar categoria de empresa',
            'permission_category_id' => $category_attribute->id,
            'activated' => 0,
        ]);

        $category_attribute = PermissionCategory::create([
            'name' => 'Productos',
            'slug' => str_slug('Productos'),
        ]);

        Permission::create([
            'name' => str_slug('Ver modulo en la barra superior'),
            'display_name' => 'Ver modulo en la barra superior',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        $category_attribute = PermissionCategory::create([
            'name' => 'Categorias de Productos',
            'slug' => str_slug('Categorias de Productos'),
        ]);

        Permission::create([
            'name' => str_slug('Ver select de categorias'),
            'display_name' => 'Ver select de categorias',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Nueva Categoria'),
            'display_name' => 'Nueva Categoria',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Editar Categoria'),
            'display_name' => 'Editar Categoria',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Eliminar Categoria'),
            'display_name' => 'Eliminar Categoria',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Nueva Sub categoria'),
            'display_name' => 'Nueva Sub categoria',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Editar Sub Categoria'),
            'display_name' => 'Editar Sub Categoria',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Eliminar Sub Categoria'),
            'display_name' => 'Eliminar Sub Categoria',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        $category_attribute = PermissionCategory::create([
            'name' => 'Crud de productos',
            'slug' => str_slug('Crud de productos'),
        ]);

        Permission::create([
            'name' => str_slug('Añadir Producto'),
            'display_name' => 'Añadir Producto',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Publicar producto'),
            'display_name' => 'Publicar producto',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Destacar producto'),
            'display_name' => 'Destacar producto',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Promocionar producto'),
            'display_name' => 'Promocionar producto',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Editar producto'),
            'display_name' => 'Editar producto',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Editar imagenes de producto'),
            'display_name' => 'Editar imagenes de producto',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Editar precio al por mayor'),
            'display_name' => 'Editar precio al por mayor',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Eliminar producto'),
            'display_name' => 'Eliminar producto',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);


        $category_attribute = PermissionCategory::create([
            'name' => 'Edición de productos',
            'slug' => str_slug('Edición de productos'),
        ]);

        // Permission::create([
        //     'name' => str_slug('Nombre comercial de producto'),
        //     'display_name' => 'Nombre comercial de producto',
        //     'permission_category_id' => $category_attribute->id,
        //     'activated' => 1,
        // ]);

        Permission::create([
            'name' => str_slug('Descripción del producto'),
            'display_name' => 'Descripción del producto',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Detalles del Producto '),
            'display_name' => 'Detalles del Producto ',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Características del Producto'),
            'display_name' => 'Características del Producto',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        // Permission::create([
        //     'name' => str_slug('Categoría de Producto'),
        //     'display_name' => 'Categoría de Producto',
        //     'permission_category_id' => $category_attribute->id,
        //     'activated' => 1,
        // ]);

        // Permission::create([
        //     'name' => str_slug('Subcategoría de producto'),
        //     'display_name' => 'Subcategoría de producto',
        //     'permission_category_id' => $category_attribute->id,
        //     'activated' => 1,
        // ]);

        // Permission::create([
        //     'name' => str_slug('Precio Web de producto'),
        //     'display_name' => 'Precio Web de producto',
        //     'permission_category_id' => $category_attribute->id,
        //     'activated' => 1,
        // ]);

        Permission::create([
            'name' => str_slug('Comisión de producto'),
            'display_name' => 'Comisión de producto',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Stock de producto'),
            'display_name' => 'Stock de producto',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Tiempo de entrega'),
            'display_name' => 'Tiempo de entrega',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Tiempo de instalación'),
            'display_name' => 'Tiempo de instalación',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Filtros para la búsqueda'),
            'display_name' => 'Filtros para la búsqueda',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('País y Ciudad'),
            'display_name' => 'País y Ciudad',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        // Permission::create([
        //     'name' => str_slug('Ciudad'),
        //     'display_name' => 'Ciudad',
        //     'permission_category_id' => $category_attribute->id,
        //     'activated' => 1,
        // ]);

        Permission::create([
            'name' => str_slug('Dirección'),
            'display_name' => 'Dirección',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Google Maps'),
            'display_name' => 'Google Maps',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Ficha técnica'),
            'display_name' => 'Ficha técnica',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Brochure del producto'),
            'display_name' => 'Brochure del producto',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        Permission::create([
            'name' => str_slug('Enlace de Youtube'),
            'display_name' => 'Enlace de Youtube',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);


        $category_attribute = PermissionCategory::create([
            'name' => 'Pedidos',
            'slug' => str_slug('Pedidos'),
        ]);

        Permission::create([
            'name' => str_slug('Ver módulo de pedidos'),
            'display_name' => 'Ver módulo de pedidos',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        $category_attribute = PermissionCategory::create([
            'name' => 'Suscripciones',
            'slug' => str_slug('Suscripciones'),
        ]);

        Permission::create([
            'name' => str_slug('Ver módulo de suscripciones'),
            'display_name' => 'Ver módulo de suscripciones',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        $category_attribute = PermissionCategory::create([
            'name' => 'Menu Principal',
            'slug' => str_slug('Menu Principal'),
        ]);

        Permission::create([
            'name' => str_slug('Ver botón mi tienda'),
            'display_name' => 'Ver botón mi tienda',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);

        $category_attribute = PermissionCategory::create([
            'name' => 'Plantillas',
            'slug' => str_slug('Plantillas'),
        ]);

        Permission::create([
            'name' => str_slug('Ver módulo de plantillas'),
            'display_name' => 'Ver módulo de plantillas',
            'permission_category_id' => $category_attribute->id,
            'activated' => 1,
        ]);


    }
}
