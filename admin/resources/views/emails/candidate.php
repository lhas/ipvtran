<h1>Nome</h1>

<p><?php echo $user->name; ?></p>

<h1>E-mail</h1>

<p><?php echo $user->email; ?></p>

<h1>Sexo</h1>

<p><?php echo $user->sex; ?></p>

<h1>CPF</h1>

<p><?php echo $user->cpf; ?></p>

<h1>RG</h1>

<p><?php echo $user->rg; ?></p>

<h1>Data de Nascimento</h1>

<p><?php echo $user->date_of_birth; ?></p>

<h1>Órgão Expedidor</h1>

<p><?php echo $user->orgao_expedidor; ?></p>

<h1>Nome da Mãe</h1>

<p><?php echo $user->mom_name; ?></p>

<h1>Endereço</h1>

<p><?php echo $user->address; ?></p>
<p><?php echo $user->address_num; ?></p>
<p><?php echo $user->address_complement; ?></p>
<p><?php echo $user->address_neighbourhood; ?></p>
<p><?php echo $user->address_cep; ?></p>

<h1>Telefone</h1>

<p><?php echo $user->phone; ?></p>

<h1>Celular</h1>

<p><?php echo $user->cell_phone; ?></p>

<h1>CNH</h1>

<p><?php echo $user->nr_cnh; ?></p>

<h1>Categoria</h1>

<p><?php echo $user->category; ?></p>

<h1>Email</h1>

<p><?php echo $user->email; ?></p>

<h1>Senha desejada</h1>

<p><?php echo $user->password; ?></p>

<h1>URL para Pagamento</h1>

<p><?php echo $user->paypal; ?></p>

<h1>Data de criação</h1>

<p><?php echo $user->created_at->format('d/m/Y H:i:s'); ?></p>