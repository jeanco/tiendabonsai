import CatalogScreen from './components/CatalogScreen'

export default {
  path: '/catalogo',
  name: 'Catalog',
  component: CatalogScreen,
  children: [
    {
      path: ':categorySlug',
      name: 'Category',
      children: [
        {
          path: ':subcategorySlug',
          name: 'Subcategory'
        }
      ]
    }
  ]
}
