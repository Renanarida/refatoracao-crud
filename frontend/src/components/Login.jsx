import React, { useState } from "react";
import { Link } from "react-router-dom";

const Login = () => {
  const [email, setEmail] = useState("");
  const [senha, setSenha] = useState("");
  const [erro, setErro] = useState("");
  const [sucesso, setSucesso] = useState("");

  const handleSubmit = async (e) => {
    e.preventDefault();
    const response = await fetch("http://localhost:8000/api/login", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ email, senha })
    });
    const data = await response.json();
    if (!response.ok) setErro(data.message || "Email ou senha incorretos.");
    else { setErro(""); setSucesso("Login realizado com sucesso!"); }
  };

  return (
    <div className="d-flex justify-content-center align-items-center vh-100" style={{ backgroundColor: "#f8f9fa" }}>
      <div className="card p-4" style={{ width: "350px" }}>
        <h3 className="mb-3">Login</h3>
        <img className="img-login mb-3" src="/img/Reuniao-email.png" alt="Foto Reunião" style={{ width: "100%", objectFit: "cover" }} />
        {erro && <div className="alert alert-danger">{erro}</div>}
        {sucesso && <div className="alert alert-success">{sucesso}</div>}

        <form onSubmit={handleSubmit}>
          <div className="mb-3">
            <label htmlFor="email" className="form-label">Email</label>
            <input type="email" id="email" required className="form-control" value={email} onChange={(e) => setEmail(e.target.value)} />
          </div>
          <div className="mb-3">
            <label htmlFor="senha" className="form-label">Senha</label>
            <input type="password" id="senha" required className="form-control" value={senha} onChange={(e) => setSenha(e.target.value)} />
          </div>
          <button type="submit" className="btn btn-primary w-100">Entrar</button>
        </form>

        <div className="mt-3 text-center">
          Esqueceu a senha? <Link to="/reset-senha">Clique aqui</Link>
        </div>

        <div className="mt-3 text-center">
          Ainda não tem conta? <Link to="/cadastrar">Cadastre-se aqui</Link>
        </div>
      </div>
    </div>
  );
};

export default Login;
