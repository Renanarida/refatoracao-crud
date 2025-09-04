import React, { useState } from "react";
import { Link } from "react-router-dom";

const Cadastrar = () => {
  const [nome, setNome] = useState("");
  const [email, setEmail] = useState("");
  const [senha, setSenha] = useState("");
  const [senhaConfirm, setSenhaConfirm] = useState("");
  const [erro, setErro] = useState("");
  const [sucesso, setSucesso] = useState("");

  const handleSubmit = async (e) => {
    e.preventDefault();
    if (senha !== senhaConfirm) { setErro("As senhas não coincidem."); return; }

    const response = await fetch("http://localhost:8000/api/cadastrar", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ nome, email, senha })
    });

    const data = await response.json();
    if (!response.ok) setErro(data.message || "Erro ao cadastrar.");
    else { setSucesso("Cadastro realizado com sucesso!"); setErro(""); setNome(""); setEmail(""); setSenha(""); setSenhaConfirm(""); }
  };

  return (
    <div className="d-flex justify-content-center align-items-center vh-100" style={{ backgroundColor: "#f8f9fa" }}>
      <div className="card p-4" style={{ width: "350px" }}>
        <h3 className="mb-3">Cadastro</h3>
        <img className="img-login mb-3" src="/img/Reuniao-email.png" alt="Foto Reunião" style={{ width: "100%", objectFit: "cover" }} />
        {erro && <div className="alert alert-danger">{erro}</div>}
        {sucesso && <div className="alert alert-success">{sucesso}</div>}

        <form onSubmit={handleSubmit} noValidate>
          <div className="mb-3">
            <label htmlFor="nome" className="form-label">Nome</label>
            <input type="text" id="nome" required className="form-control" value={nome} onChange={(e) => setNome(e.target.value)} />
          </div>
          <div className="mb-3">
            <label htmlFor="email" className="form-label">Email</label>
            <input type="email" id="email" required className="form-control" value={email} onChange={(e) => setEmail(e.target.value)} />
          </div>
          <div className="mb-3">
            <label htmlFor="senha" className="form-label">Senha</label>
            <input type="password" id="senha" required className="form-control" value={senha} onChange={(e) => setSenha(e.target.value)} />
          </div>
          <div className="mb-3">
            <label htmlFor="senha_confirm" className="form-label">Confirme a Senha</label>
            <input type="password" id="senha_confirm" required className="form-control" value={senhaConfirm} onChange={(e) => setSenhaConfirm(e.target.value)} />
          </div>
          <button type="submit" className="btn btn-primary w-100">Cadastrar</button>
        </form>

        <div className="mt-3 text-center">
          Já tem conta? <Link to="/login">Faça login</Link>
        </div>
      </div>
    </div>
  );
};

export default Cadastrar;
