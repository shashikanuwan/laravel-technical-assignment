import React, { useState } from 'react';
import axios from 'axios';
import swal from 'sweetalert';

function Login() {

    // const history = useHistory();
    const [loginInput, setLogin] = useState({
        email: '',
        password: '',
        error_list: [],
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
                    swal("Success!", res.data.message, "success");
                    setLogin({
                        error_list: [],
                    });
                    //  history.push('/dashboard');
                }
                else if (res.data.status === 422) {
                    setLogin({ ...loginInput, error_list: res.data.validate_err });
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
                                <h4>Add Students
                                    <a href="/" className="btn btn-danger btn-sm float-end"> BACK</a>
                                </h4>
                            </div>
                            <div className="card-body">

                                <form onSubmit={saveLogin} >
                                    <div className="form-group mb-3">
                                        <label>Email</label>
                                        <input type="text" name="email" onChange={handleInput} value={loginInput.email} className="form-control" />
                                        <span className="text-danger">{loginInput.error_list.email}</span>
                                    </div>

                                    <div className="form-group mb-3">
                                        <label>Password</label>
                                        <input type="text" name="password" onChange={handleInput} value={loginInput.password} className="form-control" />
                                        <span className="text-danger">{loginInput.error_list.password}</span>
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