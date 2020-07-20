import VueRouter from 'vue-router';
let routes = [

    {
        path: '/dashboard',
        name:'dashboard',
        component: require('./views/dashboard').default
    },
    {
        path: '/users',
        name:'users',
        component: require('./views/users').default
    }
];

export default new VueRouter({routes});
