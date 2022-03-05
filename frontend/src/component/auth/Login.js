import React,{useState} from "react";
import axios from "axios";
import { BrowserRouter, Route, Switch, Link} from 'react-router-dom';

function Login() {
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
  
    function sendData(e){
        e.preventDefault();
        const loginData = {
            email,
            password
        }
        axios.post('http://localhost:8000/login', loginData).then((res)=>{
            console.log(res.data)
        }).catch((err)=>{})
    }
    return (
    <BrowserRouter>
        <div id="loginPopup">
            <form onSubmit={sendData}>
                <div className="login-popup">
                    <div className="col">
                        <h6 className="loginTitle">Login to Huntomate</h6>
                    </div>
                    <div className="col">
                        <label style={{marginTop:"10px"}}>Email Address</label>
                        <input type="email" id="email" className="form-control" 
                        onChange={(e)=>{setEmail(e.target.value)}}/>
                    </div>
                    <div className="col">
                        <label>Password</label>
                        <label className="forget-password"><a href={{}}>Forget Password?</a></label>
                        <input type="password" id="password" className="form-control"
                        onChange={(e)=>{setPassword(e.target.value)}}/>
                    </div>
                    <div className="col">
                        <button type="submit" id="login" className="btn btn-primary login-btn form-control">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </BrowserRouter>
    );
}

export default Login;


// axios.defaults.baseURL = `${process.env.REACT_APP_API_URL}/projects/list`;
// axios.defaults.headers.common['Authorization'] = 'Bearer '+ localStorage.getItem("token");
// axios.get().then((res)=>{
//     console.log(res.data)
// }).catch((err)=>{})