// src/components/Header.js
import React from 'react';
import './Header.css'; // Supondo que o estilo está em um CSS separado

function Header() {
  return (
    <header>
      <div className="menu_container">
        <img
          src="/teste/img/logo_extensao.png"
          alt="Prefeitura de Ponta Porã"
          id="logo"
        />
        <a href="#" className="sair">
          <img src="/teste/img/logout.png" alt="Sair" id="IconSair" />
          <h1 id="txt_sair">Sair</h1>
        </a>
      </div>
      <nav>
        <a href="">Home</a>
        <a href="#">Mapa</a>
        <a href="">Reclamações</a>
        <a href="/teste/pages/relatorio.html">Relatório</a>
      </nav>
    </header>
  );
}

export default Header;
