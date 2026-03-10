<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Monitoramento de Servidores - Digiboard</title>
<link rel="stylesheet" href="estilo.css">
</head>

<body>

<div class="dashboard-header">
  <img src="i/logo1.png" alt="Logo" class="dashboard-logo">
  <h1 class="dashboard-title">Painel de Monitoramento de Servidores</h1>
  <button id="btn-tema" onclick="alternarTema()">☀️ Modo Claro</button>
</div>

<div class="dashboard-body">

  <!-- ================= ADMINISTRATIVOS ================= -->
  <div class="section-block">
    <h2 class="section-title">Servidores Administrativos</h2>
    <div class="container-cards">

      <div class="card">
        <div class="card-header">SRVLDD2020</div>
        <div class="metric">
          <div class="label-group"><span>CPU</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar cpu-b"></div>
          </div><span class="barra-valor cpu-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Carga Média (1 min)</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar load-b"></div>
          </div><span class="barra-valor load-v">0.000</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Memória</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar mem-b"></div>
          </div><span class="barra-valor mem-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Disco</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar disk-b"></div>
          </div><span class="barra-valor disk-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>SWAP</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar swap-b"></div>
          </div><span class="barra-valor swap-value">0%</span></div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">Administrativos - FTP - EM BREVE</div>
        <div class="metric">
          <div class="label-group"><span>CPU</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar cpu-b"></div>
          </div><span class="barra-valor cpu-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Carga Média (1 min)</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar load-b"></div>
          </div><span class="barra-valor load-v">0.000</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Memória</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar mem-b"></div>
          </div><span class="barra-valor mem-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Disco</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar disk-b"></div>
          </div><span class="barra-valor disk-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>SWAP</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar swap-b"></div>
          </div><span class="barra-valor swap-value">0%</span></div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">SRVDGB088 - DB SISTEMAS</div>
        <div class="metric">
          <div class="label-group"><span>CPU</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar cpu-b"></div>
          </div><span class="barra-valor cpu-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Carga Média (1 min)</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar load-b"></div>
          </div><span class="barra-valor load-v">0.000</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Memória</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar mem-b"></div>
          </div><span class="barra-valor mem-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Disco</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar disk-b"></div>
          </div><span class="barra-valor disk-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>SWAP</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar swap-b"></div>
          </div><span class="barra-valor swap-value">0%</span></div>
        </div>
      </div>

    </div>
  </div>

  <!-- ================= JIGS AUTOMATICOS ================= -->
  <div class="section-block">
    <h2 class="section-title">Jigs Automáticos</h2>
    <div class="container-cards">

      <div class="card">
        <div class="card-header">Sistema Integrado - ITJRTS - EM BREVE</div>
        <div class="metric">
          <div class="label-group"><span>CPU</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar cpu-b"></div>
          </div><span class="barra-valor cpu-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Carga Média (1 min)</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar load-b"></div>
          </div><span class="barra-valor load-v">0.000</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Memória</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar mem-b"></div>
          </div><span class="barra-valor mem-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Disco</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar disk-b"></div>
          </div><span class="barra-valor disk-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>SWAP</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar swap-b"></div>
          </div><span class="barra-valor swap-value">0%</span></div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">INSTITUTO JC</div>
        <div class="metric">
          <div class="label-group"><span>CPU</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar cpu-b"></div>
          </div><span class="barra-valor cpu-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Carga Média (1 min)</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar load-b"></div>
          </div><span class="barra-valor load-v">0.000</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Memória</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar mem-b"></div>
          </div><span class="barra-valor mem-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Disco</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar disk-b"></div>
          </div><span class="barra-valor disk-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>SWAP</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar swap-b"></div>
          </div><span class="barra-valor swap-value">0%</span></div>
        </div>
      </div>

    </div>
  </div>

  <!-- ================= AMBIENTE SFCS ================= -->
  <div class="section-block">
    <h2 class="section-title">Ambiente SFCS</h2>
    <div class="container-cards">

      <div class="card">
        <div class="card-header">SRVDGB028 - SFCSWEB2 147.1.160.20</div>
        <div class="metric">
          <div class="label-group"><span>CPU</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar cpu-b"></div>
          </div><span class="barra-valor cpu-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Carga Média (1 min)</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar load-b"></div>
          </div><span class="barra-valor load-v">0.000</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Memória</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar mem-b"></div>
          </div><span class="barra-valor mem-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Disco</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar disk-b"></div>
          </div><span class="barra-valor disk-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>SWAP</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar swap-b"></div>
          </div><span class="barra-valor swap-value">0%</span></div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">SRVDGB029 - 147.1.160.40</div>
        <div class="metric">
          <div class="label-group"><span>CPU</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar cpu-b"></div>
          </div><span class="barra-valor cpu-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Carga Média (1 min)</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar load-b"></div>
          </div><span class="barra-valor load-v">0.000</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Memória</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar mem-b"></div>
          </div><span class="barra-valor mem-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Disco</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar disk-b"></div>
          </div><span class="barra-valor disk-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>SWAP</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar swap-b"></div>
          </div><span class="barra-valor swap-value">0%</span></div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">SRVDGB023 - PDA 147.0.0.130</div>
        <div class="metric">
          <div class="label-group"><span>CPU</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar cpu-b"></div>
          </div><span class="barra-valor cpu-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Carga Média (1 min)</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar load-b"></div>
          </div><span class="barra-valor load-v">0.000</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Memória</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar mem-b"></div>
          </div><span class="barra-valor mem-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Disco</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar disk-b"></div>
          </div><span class="barra-valor disk-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>SWAP</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar swap-b"></div>
          </div><span class="barra-valor swap-value">0%</span></div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">SRVDGB008 - 147.1.0.116</div>
        <div class="metric">
          <div class="label-group"><span>CPU</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar cpu-b"></div>
          </div><span class="barra-valor cpu-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Carga Média (1 min)</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar load-b"></div>
          </div><span class="barra-valor load-v">0.000</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Memória</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar mem-b"></div>
          </div><span class="barra-valor mem-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Disco</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar disk-b"></div>
          </div><span class="barra-valor disk-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>SWAP</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar swap-b"></div>
          </div><span class="barra-valor swap-value">0%</span></div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">SRVDGB026 - SCRPSERVER-CELULAR 147.1.0.149</div>
        <div class="metric">
          <div class="label-group"><span>CPU</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar cpu-b"></div>
          </div><span class="barra-valor cpu-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Carga Média (1 min)</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar load-b"></div>
          </div><span class="barra-valor load-v">0.000</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Memória</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar mem-b"></div>
          </div><span class="barra-valor mem-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Disco</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar disk-b"></div>
          </div><span class="barra-valor disk-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>SWAP</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar swap-b"></div>
          </div><span class="barra-valor swap-value">0%</span></div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">SRVDGB025</div>
        <div class="metric">
          <div class="label-group"><span>CPU</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar cpu-b"></div>
          </div><span class="barra-valor cpu-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Carga Média (1 min)</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar load-b"></div>
          </div><span class="barra-valor load-v">0.000</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Memória</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar mem-b"></div>
          </div><span class="barra-valor mem-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>Disco</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar disk-b"></div>
          </div><span class="barra-valor disk-v">0%</span></div>
        </div>
        <div class="metric">
          <div class="label-group"><span>SWAP</span></div>
          <div class="metric-row"><div class="progress-bg">
            <div class="progress-bar swap-b"></div>
          </div><span class="barra-valor swap-value">0%</span></div>
        </div>
      </div>

    </div>
  </div>

</div><!-- /.dashboard-body -->

<!-- Indicador de atualização -->
<div id="update-indicator" class="update-indicator" style="display:none;">
  <span class="update-dot"></span> ATUALIZANDO...
</div>

<footer class="dashboard-footer">
  <span>© 2026 <strong>Digiboard Eletrônica da Amazônia Ltda</strong> • DTI</span>
  <span class="footer-sep"></span>
  <span>ÚLTIMA ATUALIZAÇÃO: <strong id="ultimo-update">--:--:--</strong></span>
  <span class="footer-sep"></span>
  <span id="status-conexao" class="status-ok">● ONLINE</span>
  <span class="footer-sep"></span>
</footer>

<script src="script.js"></script>
<script src="tema.js"></script>
</body>
</html>