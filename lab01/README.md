# Laboratório 1 — Laravel Playground

## 🎯 Objetivo

Praticar os conceitos fundamentais do framework Laravel — roteamento, views Blade, requisições HTTP e controle de sessão — utilizando o ambiente online [laravelplayground.com](https://laravelplayground.com), sem necessidade de instalação local.

---

## 🛠️ Tecnologias Usadas

- [Laravel](https://laravel.com/) (via Laravel Playground)
- PHP 8+
- Blade Template Engine
- Facades: `Route`, `Hash`

---

## 📋 Atividades

### Atividade 1 — Rotas e Views Dinâmicas
- Rota `/` → página inicial
- Rota `/hello/{nome}` → retorna string direta com o nome
- Rota `/bem-vindo/{nome?}` → renderiza view `saudacao.blade.php`
- Rota `/soma` → calculadora via formulário GET com view `soma.blade.php`

### Atividade 2 — Mini Login com Sessão
- Formulário de login com proteção `@csrf`
- Autenticação com `Hash::check()`
- Dashboard protegido por sessão
- Logout com `session()->forget()`

### Atividade 3 — Desafio
- Calculadora com opções de **soma** e **multiplicação**
- Array com 3 usuários diferentes (senhas via `Hash::make()`)
- Aviso de "Login necessário" ao acessar `/dashboard` sem sessão

---

## 🚀 Como Executar

1. Acesse [laravelplayground.com](https://laravelplayground.com)
2. No painel lateral, abra o `index.php` e cole o código das rotas
3. Crie os arquivos de view clicando em **+**:
   - `saudacao.blade.php`
   - `soma.blade.php`
   - `login.blade.php`
   - `dashboard.blade.php`
4. Clique em **Run** e teste as rotas no preview

---
