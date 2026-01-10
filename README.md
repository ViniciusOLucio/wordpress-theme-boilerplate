# 🚀 WordPress Theme Boilerplate

Tema WordPress moderno usando Vite para compilação de assets (SCSS e JavaScript) com Hot Module Replacement (HMR).

## 📋 Requisitos

- Node.js 18+ e npm
- Composer
- WordPress 5.0+
- Local by Flywheel (ou qualquer servidor local WordPress)

## ⚙️ Instalação

### 1. Clone o projeto

No diretório `wp-content/themes/` do seu WordPress, rode:

```bash
    git clone https://github.com/ViniciusOLucio/wordpress-theme-boilerplate.git
    cd seu-tema
```

### 2. Instale as dependências

```bash
    composer install
    npm install
```

### 3. Ative o tema no WordPress

Vá em **Aparência → Temas** no painel do WordPress e ative o tema.


## 🛠️ Comandos Disponíveis

### Desenvolvimento

```bash
  npm run dev
```
**Use este comando enquanto desenvolve!**

### Produção

```bash
    npm run build
```

**Use este comando antes de subir para produção!**

### Formatação e Linting

```bash
    # Formata todos os arquivos automaticamente
    npm run format
    
    # Verifica formatação sem alterar arquivos
    npm run format:check
    
    # Verifica erros no JavaScript
    npm run lint
    
    # Corrige erros no JavaScript automaticamente
    npm run lint:fix
```

## Como Funciona o Hot Reload

### Em Desenvolvimento (`npm run dev`):

1. O Vite cria um arquivo `hot` na raiz do tema
2. O WordPress detecta este arquivo via `vite.php`
3. Os assets são carregados de `http://localhost:5173/`
4. Quando você salva alterações:
  - **SCSS:** CSS atualiza instantaneamente sem refresh
  - **JS:** Página recarrega automaticamente
  - **PHP:** Precisa dar F5 manualmente

### Em Produção (após `npm run build`):

1. O arquivo `hot` não existe
2. O WordPress carrega os assets da pasta `dist/`
3. Assets são otimizados e cacheáveis

## 📝 Como Adicionar CSS/JavaScript

### Adicionando SCSS

Crie arquivos `.scss` na pasta `assets/css/scss/` e importe no arquivo apropriado:

```scss
// Exemplo: assets/css/scss/pages/_index.scss
@use "front-page";
@use "error-404";
```

### Adicionando JavaScript

Edite o arquivo `assets/js/app.js`:

```javascript
// assets/js/app.js
import '../css/main.scss';  // Sempre mantenha esta linha!
```

## 🚀 Deploy para Produção

### 1. Compile os assets:

```bash
npm run build
```

### 2. Faça upload dos seguintes arquivos/pastas:

```
✅ dist/                    (assets compilados)
✅ inc/                     (includes do tema)
✅ assets/img/              (imagens apenas)
✅ *.php                    (todos os arquivos PHP)
✅ style.css                (obrigatório pelo WordPress)
✅ screenshot.png           (screenshot do tema)

❌ node_modules/           (NÃO enviar)
❌ vendor/                 (NÃO enviar)
❌ assets/css/scss/        (NÃO enviar - já compilado)
❌ assets/js/              (NÃO enviar - já compilado)
❌ hot                     (NÃO enviar)
❌ package.json            (opcional)
❌ composer.json           (opcional)
❌ vite.config.js          (opcional)
```

### 3. No servidor de produção:

- Os assets serão carregados de `dist/` automaticamente
- O HMR não estará ativo (é esperado)

## 💡 Dicas

### Performance

- Em desenvolvimento, o CSS é injetado via JavaScript para HMR funcionar
- Em produção, o CSS é extraído para arquivo separado e cacheável
- Use `npm run build` antes de fazer testes de performance

### Organização

- Mantenha componentes SCSS separados em `assets/css/scss/`
- Use a metodologia que preferir (BEM, SMACSS, etc)
- Imports do SCSS sempre no `app.js` (não no PHP!)


## 📚 Tecnologias Utilizadas

- [Vite](https://vitejs.dev/) - Build tool e dev server
- [Sass](https://sass-lang.com/) - Preprocessador CSS
- [PostCSS](https://postcss.org/) - Transformações CSS
- [Autoprefixer](https://github.com/postcss/autoprefixer) - Prefixos CSS automáticos
- [Prettier](https://prettier.io/) - Formatação de código
- [ESLint](https://eslint.org/) - Linting JavaScript

## 📄 Licença

MIT

## 🤝 Contribuindo

Sinta-se livre para abrir issues ou pull requests com melhorias!

---

**Desenvolvido por:**  
[Jhonatan David](https://github.com/jotahdavid) • [Vinicius Lucio](https://github.com/ViniciusOLucio/)  • [Ygor Combi](https://github.com/combizera/)

*Feito com ❤️ usando Vite + WordPress*
