let routes= [];
let routes_list= [];

import List from '../pages/subjects/List.vue'
import Form from '../pages/subjects/Form.vue'
import Item from '../pages/subjects/Item.vue'

routes_list = {

    path: '/subjects',
    name: 'subjects.index',
    component: List,
    props: true,
    children:[
        {
            path: 'form/:id?',
            name: 'subjects.form',
            component: Form,
            props: true,
        },
        {
            path: 'view/:id?',
            name: 'subjects.view',
            component: Item,
            props: true,
        }
    ]
};

routes.push(routes_list);

export default routes;

