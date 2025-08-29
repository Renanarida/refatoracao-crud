import React, { useState } from 'react';
import { Modal, Button, Form } from 'react-bootstrap';

export default function ModalReuniao({ show, handleClose }) {
  const [data, setData] = useState('');
  const [hora, setHora] = useState('');
  const [local, setLocal] = useState('');
  const [assunto, setAssunto] = useState('');

  const handleSubmit = async (e) => {
    e.preventDefault();

    const scheduled_at = `${data}T${hora}:00`;
    const payload = {
      title: assunto,
      description: local,
      scheduled_at: scheduled_at,
    };

    try {
      const response = await fetch('http://localhost:8000/api/meetings', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(payload),
      });

      if (response.ok) {
        alert('Reunião cadastrada com sucesso!');
        handleClose();
        // resetar o formulário
        setData('');
        setHora('');
        setLocal('');
        setAssunto('');
      } else {
        alert('Erro ao cadastrar reunião.');
      }
    } catch (error) {
      console.error(error);
      alert('Erro ao comunicar com o servidor.');
    }
  };

  return (
    <Modal show={show} onHide={handleClose} backdrop="static" centered>
      <Modal.Header closeButton>
        <Modal.Title>Cadastrar Reunião</Modal.Title>
      </Modal.Header>
      <Form onSubmit={handleSubmit}>
        <Modal.Body>
          <Form.Group className="mb-3">
            <Form.Label>Data</Form.Label>
            <Form.Control type="date" value={data} onChange={e => setData(e.target.value)} required />
          </Form.Group>
          <Form.Group className="mb-3">
            <Form.Label>Hora</Form.Label>
            <Form.Control type="time" value={hora} onChange={e => setHora(e.target.value)} required />
          </Form.Group>
          <Form.Group className="mb-3">
            <Form.Label>Local</Form.Label>
            <Form.Control type="text" value={local} onChange={e => setLocal(e.target.value)} />
          </Form.Group>
          <Form.Group className="mb-3">
            <Form.Label>Assunto</Form.Label>
            <Form.Control type="text" value={assunto} onChange={e => setAssunto(e.target.value)} required />
          </Form.Group>
        </Modal.Body>
        <Modal.Footer>
          <Button variant="secondary" onClick={handleClose}>Cancelar</Button>
          <Button type="submit" variant="primary">Cadastrar</Button>
        </Modal.Footer>
      </Form>
    </Modal>
  );
}