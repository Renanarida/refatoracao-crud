// src/TelaPrincipal.js
import React, { useState, useEffect } from 'react';
import './App.css';

function TelaPrincipal() {
  const [reunioes, setReunioes] = useState([]);
  const [tipoUsuario, setTipoUsuario] = useState(localStorage.getItem('tipo_usuario') || 'visitante');
  const [cpf, setCpf] = useState(localStorage.getItem('cpf_participante') || '');

  useEffect(() => {
    fetch('http://localhost:8000/api/meetings')
      .then(res => res.json())
      .then(data => setReunioes(data))
      .catch(err => console.error('Erro ao buscar reuniões:', err));
  }, []);

  return (
    <div className="container mt-4">
      <h2>Reuniões</h2>

      {tipoUsuario === 'usuario' && (
        <button className="btn btn-primary mb-3">Cadastrar Reunião</button>
      )}

      <div className="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        {reunioes.map((reuniao) => (
          <div key={reuniao.id} className="col">
            <div className="card h-100">
              <div className="card-body">
                <h6 className="card-subtitle mb-2 text-muted">
                  {new Date(reuniao.data).toLocaleDateString()} às {reuniao.hora}
                </h6>
                <h5 className="card-title">{reuniao.assunto}</h5>
                <p className="card-text">
                  <strong>Local:</strong> {reuniao.local}
                </p>
              </div>
              <div className="card-footer bg-transparent border-top-0">
                {/* Aqui você adicionará os botões de editar, excluir etc. */}
              </div>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
}

export default TelaPrincipal;
