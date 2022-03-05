import React from "react";
import { BrowserRouter, Route, Routes } from 'react-router-dom';
import axios from "axios";

import Login from "./component/auth/Login";
import Register from "./component/auth/Register";
import Navbar from "./layouts/Navbar";
import Home from "./component/Home";

axios.defaults.baseURL = "http://localhost:8000/";
axios.defaults.headers.post['Content-Type'] = 'application/json';
axios.defaults.headers.post['Accept'] = 'application/json';
axios.defaults.withCredentials = true;

function App() {
  return (
    <div className="App">
      <Navbar />
      <BrowserRouter>
        <Routes>
        <Route path="/" element={<Home />} />
          <Route path="/login" element={<Login />} />
          <Route path="/register" element={<Register />} />
        </Routes>
      </BrowserRouter>
    </div>
  );
}

export default App;
