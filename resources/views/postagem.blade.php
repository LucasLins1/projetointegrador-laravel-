@include("components.header")

<h1 style="text-align: center;">CADASTRO DE PET</h1>
 
  <main class="container postcont">
   <section class="left-panel">
    <form id="form-upload-fotos" action="#" method="POST" enctype="multipart/form-data">
        <div class="upload-box">
            <span>📷</span>
            <p>Envie uma ou mais fotos do pet</p>
            <div class="input-file-container">
                <label for="inputArquivo" class="custom-file-upload">Selecionar fotos</label>
                <input type="file" name="foto" id="inputArquivo" multiple accept="image/*">
            </div>
            <div id="preview-imagens" class="preview-imagens-container"></div>
        </div>
    </form>
</section>
 
<script>
  
  document.addEventListener('DOMContentLoaded', () => {
    const inputArquivo = document.getElementById('inputArquivo');
    const previewContainer = document.getElementById('preview-imagens');
 
    inputArquivo.addEventListener('change', (event) => {
        // Limpa as miniaturas anteriores para exibir as novas
        previewContainer.innerHTML = '';
       
        const arquivos = event.target.files;
 
        if (arquivos) {
            for (const arquivo of arquivos) {
                // Certifica-se de que o arquivo é uma imagem
                if (arquivo.type.startsWith('image/')) {
                    const reader = new FileReader();
 
                    reader.onload = (e) => {
                        const previewItem = document.createElement('div');
                        previewItem.classList.add('preview-imagem-item');
 
                        const imagem = document.createElement('img');
                        imagem.src = e.target.result;
                        imagem.alt = arquivo.name;
 
                        previewItem.appendChild(imagem);
                        previewContainer.appendChild(previewItem);
                    };
 
                    // Lê o arquivo como uma URL de dados (base64)
                    reader.readAsDataURL(arquivo);
                }
            }
        }
    });
});
</script>
 
    <section class="right-panel">
      <form method="POST" action="{{ route('postagem.store') }}">
        @csrf
        
        <label for="tipo_cadastro">Tipo de cadastro</label>
        <select name="tipo_cadastro" id="tipo_cadastro" onchange="gerenciarCamposPerdido()">
          <option value="" disabled selected>Ex: Doação, Perdido</option>
          <option value="doacao">Doação</option>
          <option value="perdido">Perdido</option>
        </select>
 
        <label for="tipo_animal">Tipo de animal</label>
        <select name="tipo_animal" id="tipo_animal" onchange="verificarOutroTipo()">
          <option value="" disabled selected>Ex: Cachorro, Gato</option>
          <option value="cachorro">Cachorro</option>
          <option value="gato">Gato</option>
          <option value="outro">Outro</option>
        </select>
 
         <label for="tem_nome">O pet tem nome?</label>
      <select id="tem_nome">
        <option value="">Selecione</option>
        <option value="sim">Sim</option>
        <option value="nao">Não</option>
      </select>
 
      <div id="campo-nome" style="display: none;">
        <label for="nome_pet">Nome do pet</label>
        <input type="text" id="nome_pet" name="nome_pet" placeholder="Digite o nome do pet" />
      </div>
 
 
        <label>Raça</label>
        <input type="text" name="raca" placeholder="Ex: Labrador, Vira-lata, Pintcher" />
 
        <div class="campos-lado-a-lado">
          <div>
            <label for="genero">Gênero</label>
            <select name="genero" id="genero">
              <option value="" disabled selected>Selecione</option>
              <option value="macho">Macho</option>
              <option value="femea">Fêmea</option>
            </select>
          </div>
 
          <div>
            <label for="idade">Idade</label>
            <input type="text" name="idade" placeholder="Ex: 05 meses, 5 anos" />
          </div>
        </div>
 
        <label>Características do Pet (Tags)</label>
<div class="tag-checkboxes">
    <div class="tag-item">
      <input type="checkbox" id="tag-castrado" name="tags[]" value="castrado">
      <label for="tag-castrado">Castrado</label>
    </div>
 
    <div class="tag-item">
      <input type="checkbox" id="tag-vacinado" name="tags[]" value="vacinado">
      <label for="tag-vacinado">Vacinado</label>
    </div>
 
    <div class="tag-item">
      <input type="checkbox" id="tag-porte-pequeno" name="tags[]" value="porte pequeno">
      <label for="tag-porte-pequeno">Porte Pequeno</label>
    </div>
 
    <div class="tag-item">
      <input type="checkbox" id="tag-porte-medio" name="tags[]" value="porte médio">
      <label for="tag-porte-medio">Porte Médio</label>
    </div>
 
    <div class="tag-item">
      <input type="checkbox" id="tag-porte-grande" name="tags[]" value="porte grande">
      <label for="tag-porte-grande">Porte Grande</label>
    </div>
 
    <div class="tag-item">
      <input type="checkbox" id="tag-bom-criancas" name="tags[]" value="bom com crianças">
      <label for="tag-bom-criancas">Bom com Crianças</label>
    </div>
 
    <div class="tag-item">
      <input type="checkbox" id="tag-adocao-urgente" name="tags[]" value="adoção urgente">
      <label for="tag-adocao-urgente">Adoção Urgente</label>
    </div>
 
    <div class="tag-item">
      <input type="checkbox" id="tag-adestrado" name="tags[]" value="adestrado">
      <label for="tag-adestrado">Adestrado</label>
    </div>  
 
    <div class="tag-item">
      <input type="checkbox" id="tag-boa-saude" name="tags[]" value="boa saúde">
      <label for="tag-boa-saude">Boa Saúde</label>
    </div>
 
    <div class="tag-item">
      <input type="checkbox" id="tag-docil" name="tags[]" value="dócil">
      <label for="tag-docil">Dócil</label>
    </div>
 
    <div class="tag-item">
      <input type="checkbox" id="tag-brincalhao" name="tags[]" value="brincalhão">
      <label for="tag-brincalhao">Brincalhão</label>
    </div>
 
    <div class="tag-item">
      <input type="checkbox" id="tag-sociavel" name="tags[]" value="sociável">
      <label for="tag-sociavel">Sociável</label>
    </div>
 
    <div class="tag-item">
      <input type="checkbox" id="tag-alegre" name="tags[]" value="alegre">
      <label for="tag-alegre">Alegre</label>
    </div>
 
    <div class="tag-item">
      <input type="checkbox" id="tag-companheiro" name="tags[]" value="companheiro">
      <label for="tag-companheiro">Companheiro</label>
    </div>
</div>
 
        <label>Contato com tutor</label>
        <input type="text" name="contato" placeholder="Ex: Telefone; Email; Whatsapp." />
 
        <div id="campo-ultima-localizacao" style="display: none;">
          <label for="ultima-localizacao">Última localização</label>
          <input type="text" name="ultima_localizacao" id="ultima-localizacao" />
        </div>
 
        <label>Informações adicionais</label>
        <textarea name="informacoes" rows="4"></textarea>
 
        <button type="submit" class="botao-publicar">Publicar</button>
      </form>

    </section>
 
     <button type="submit" class="botao-publicar-mobile">Publicar</button>
  </main>

@include("components.footer")