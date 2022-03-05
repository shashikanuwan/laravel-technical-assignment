import React, { useState } from 'react';
import axios from 'axios';
import swal from 'sweetalert';

function Register() {

    // const History = useHistory();
    const [registerInput, setRegister] = useState({
        first_name: '',
        last_name: '',
        email: '',
        phone_number: '',
        password: '',
        password_confirmation: '',
        errors: [],
    });

    const handleInput = (e) => {
        e.persist();
        setRegister({ ...registerInput, [e.target.name]: e.target.value })
    }

    const saveRegister = (e) => {
        e.preventDefault();

        const data = {
            first_name: registerInput.first_name,
            last_name: registerInput.last_name,
            email: registerInput.email,
            phone_number: registerInput.phone_number,
            password: registerInput.password,
            password_confirmation: registerInput.password_confirmation,
        }

        axios.get('/sanctum/csrf-cookie').then(response => {
            axios.post(`http://localhost:8000/api/register`, data).then(res => {

                if (res.data.status === 200) {
                    swal("Success!", res.data.message, "success");
                    setRegister({
                        name: '',
                        email: '',
                        phone_number: '',
                        errors: [],
                    });
                      History.push('/login');
                }
                else {
                    setRegister({ ...registerInput, errors: res.errors });
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
                                <h4>Register</h4>
                            </div>
                            <div className="card-body">

                                <form onSubmit={saveRegister} >
                                    <div className="form-group mb-3">
                                        <label>First name</label>
                                        <input type="text" name="first_name" onChange={handleInput} value={registerInput.first_name} className="form-control" />
                                        <span className="text-danger">{registerInput.errors.first_name}</span>
                                    </div>
                                    <div className="form-group mb-3">
                                        <label>Last Name</label>
                                        <input type="text" name="last_name" onChange={handleInput} value={registerInput.last_name} className="form-control" />
                                        <span className="text-danger">{registerInput.errors.last_name}</span>
                                    </div>
                                    <div className="form-group mb-3">
                                        <label>Email</label>
                                        <input type="text" name="email" onChange={handleInput} value={registerInput.email} className="form-control" />
                                        <span className="text-danger">{registerInput.errors.email}</span>
                                    </div>
                                    <div className="form-group mb-3">
                                        <label>phone_number</label>
                                        <input type="text" name="phone_number" onChange={handleInput} value={registerInput.phone_number_number} className="form-control" />
                                        <span className="text-danger">{registerInput.errors.phone_number}</span>
                                    </div>
                                    <div className="form-group mb-3">
                                        <label>Password</label>
                                        <input type="password" name="password" onChange={handleInput} value={registerInput.password} className="form-control" />
                                        <span className="text-danger">{registerInput.errors.password}</span>
                                    </div>
                                    <div className="form-group mb-3">
                                        <label>Confirm Password</label>
                                        <input type="password" name="password_confirmation" onChange={handleInput} value={registerInput.password_confirmation} className="form-control" />
                                        <span className="text-danger">{registerInput.errors.password_confirmation}</span>
                                    </div>
                                    <div className="form-group mb-3">
                                        <button type="submit" className="btn btn-primary">Register Now</button>
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

export default Register;