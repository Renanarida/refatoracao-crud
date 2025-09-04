import React from "react";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Home from "./components/Home";
import Cadastrar from "./components/Cadastrar";
import Login from "./components/Login";

const App = () => (
  <Router>
    <Routes>
      <Route path="/" element={<Home />} />
      <Route path="/cadastrar" element={<Cadastrar />} />
      <Route path="/login" element={<Login />} />
    </Routes>
  </Router>
);

export default App;