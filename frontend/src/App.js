import React from "react";
import Home from "./component/Home";

import axios from "axios";

axios.defaults.headers.post['Content-Type'] = 'application/jon';
axios.defaults.headers.post['Accept'] = 'application/jon';

axios.defaults.withCredentials = true;

function App() {
  return (
    <div className="App">
      <Home />
    </div>
  );
}

export default App;
