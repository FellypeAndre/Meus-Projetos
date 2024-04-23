<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Abas com Cores Combinando</title>
<style>
  /* Estilos gerais */
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    text-align: center;
  }
  
  /* Estilos das abas */
  .tab {
    display: none;
    padding: 20px;
    border: 1px solid #ccc;
    background-color: #fff;
  }
  
  /* Estilos do menu das abas */
  .tab-menu {
    display: flex;
    list-style: none;
    padding: 0;
  }
  
  .tab-menu li {
    margin: 0;
    padding: 10px 20px;
    cursor: pointer;
    background-color: #3498db;
    color: #fff;
    border-radius: 5px 5px 0 0;
    margin-bottom: -1px;
  }
  
  .tab-menu li.active {
    background-color: #2980b9;
  }
</style>
</head>
<body>
  <!-- Menu das abas -->
  <ul class="tab-menu">
    <li class="tab-button active" onclick="showTab('tab1')">Aba 1</li>
    <li class="tab-button" onclick="showTab('tab2')">Aba 2</li>
    <li class="tab-button" onclick="showTab('tab3')">Aba 3</li>
  </ul>

  <!-- Conteúdo das abas -->
  <div id="tab1" class="tab" style="display: block;">
    <h2>Aba 1</h2>
    <p>Conteúdo da aba 1.</p>
  </div>

  <div id="tab2" class="tab">
    <h2>Aba 2</h2>
    <p>Conteúdo da aba 2.</p>
  </div>

  <div id="tab3" class="tab">
    <h2>Aba 3</h2>
    <p>Conteúdo da aba 3.</p>
  </div>

  <script>
    function showTab(tabId) {
      const tabs = document.querySelectorAll('.tab');
      const buttons = document.querySelectorAll('.tab-button');

      tabs.forEach(tab => tab.style.display = 'none');
      buttons.forEach(button => button.classList.remove('active'));

      document.getElementById(tabId).style.display = 'block';
      document.querySelector(`[onclick="showTab('${tabId}')"`).classList.add('active');
    }
  </script>
</body>
</html>
