// import Construction from '@/app/screens/Construction'
import Home from '@/app/screens/Home'
import Catalog from '@/app/screens/Catalog'
import NotFound from '@/app/screens/NotFound'
import Product from '@/app/screens/Product'
import Order from '@/app/screens/Order'
import AboutUs from '@/app/screens/AboutUs'
import Contact from '@/app/screens/Contact'
import Services from '@/app/screens/Services'
import Support from '@/app/screens/Support'
import BoyfriendsClub from '@/app/screens/BoyfriendsClub'
import Claims from '@/app/screens/Claims'
import Posts from '@/app/screens/Posts'
import Post from '@/app/screens/Post'

const routes = [
  Claims,
  AboutUs,
  Order,
  Home,
  Catalog,
  Product,
  Contact,
  Services,
  Support,
  BoyfriendsClub,
  Posts,
  Post,
  NotFound,
  {
    path: '*',
    redirect: { name: 'NotFound' }
  }
]

export default routes
