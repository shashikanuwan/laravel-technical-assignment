import Login from "../component/auth/Login";
import Register from "../component/auth/Register"

const routes = [
    { path: '/login', exact: true, name: 'Login', component: Login },
    { path: '/register', exact: true, name: 'Register', component: Register },
];

export default routes;