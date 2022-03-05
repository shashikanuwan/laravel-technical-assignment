import React, { useState } from 'react';
import axios from 'axios';
import swal from 'sweetalert';

function Login() {

    // const history = useHistory();
    const [loginInput, setLogin] = useState({
        email: '',
        password: '',
        errors: [],
    });

    const handleInput = (e) => {
        e.persist();
        setLogin({ ...loginInput, [e.target.name]: e.target.value })
    }

    const saveLogin = (e) => {
        e.preventDefault();

        const data = {
            email: loginInput.email,
            password: loginInput.password,
        }

        axios.get('/sanctum/csrf-cookie').then(response => {
            axios.post(`/api/login`, data).then(res => {

                if (res.data.status === 200) {
                    localStorage.setItem('token', res.data.token)
                    History.push('/dashboard');
                }
                else {
                    setLogin({ ...loginInput, errors: res.errors });
                }
            });
        });
    }

    return (
        <div>
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-6">
                        <div className="card">
                            <div className="card-header">
                                <div className="card-header">
                                    <h4>Login</h4>
                                </div>
                            </div>
                            <div className="card-body">

                                <form onSubmit={saveLogin} >
                                    <div className="form-group mb-3">
                                        <label>Email</label>
                                        <input type="text" name="email" onChange={handleInput} value={loginInput.email} className="form-control" />
                                        <span className="text-danger">{loginInput.errors.email}</span>
                                    </div>

                                    <div className="form-group mb-3">
                                        <label>Password</label>
                                        <input type="text" name="password" onChange={handleInput} value={loginInput.password} className="form-control" />
                                        <span className="text-danger">{loginInput.errors.password}</span>
                                    </div>

                                    <div className="form-group mb-3">
                                        <button type="submit" className="btn btn-primary">Login Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );

}

export default Login;