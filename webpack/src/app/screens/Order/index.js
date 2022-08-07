import OrderScreen from './components/OrderScreen'

import Info from './screens/Info'
import Detail from './screens/Detail'

export default {
  path: '/orden',
  name: 'Order',
  component: OrderScreen,
  children: [
    Info,
    Detail
  ]
}
