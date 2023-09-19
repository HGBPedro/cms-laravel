#cms-laravel

O projeto está utilizando o sail como forma de dockerização. Dessa forma, para rodar algum comando como migrate, é necessario chamar o script sail:
```bash
	./vendor/bin/sail [command]
```

No caso do linux, também é possível fazer criar um alias para chamar apenas "sail":
```bash
  alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail' 
```

Depois disso, basta rodar os migrations e os seeders:

```bash
	./vendor/bin/sail artisan migrate --seed
```

Para rodar o projeto basta usar os comandos:
```bash
	./vendor/bin/sail up
	./vendor/bin/sail npm run dev
```

Agora basta acessar o localhost para visualizar a página.
Para entrar no modo administrativo entre no link localhost/admin.
O usuário admin padrão é admincms@yopmail.com e a senha é admin.
A senha dos outros usuários é password.
