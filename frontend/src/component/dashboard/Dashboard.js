import React from "react";

function Dashboard() {
    return (
        <div>
           <nav className="navbar navbar-expand-lg navbar-dark bg-primary">
            <div className="container">
               Navbar

                <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span className="navbar-toggler-icon"></span>
                </button>
                <div className="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul className="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li className="nav-item">
                        Home
                        </li>
                        <li className="nav-item">
                            Login
                        </li>
                        <li className="nav-item">
                            Register
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        </div>
    )
}

export default Dashboard;