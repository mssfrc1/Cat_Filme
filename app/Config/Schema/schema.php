<?php 
class AppSchema extends CakeSchema {

	public function before($event = array()) {
		$db = ConnectionManager::getDataSource($this->connection);
		$db->cacheSources = false;
		return true;
	}

	/*
	* Método Destinado para popular o banco de dados
	*/
	public function after($event = array()) {

		App::uses('ClassRegistry', 'Utility');
		$categoria = ClassRegistry::init('categoria');
		$filme = ClassRegistry::init('filmes');

		if (isset($event['create'])) {
			switch ($event['create']) {
					case 'categorias':
						
						//Array utilizado para popular as categorias
						$arrayCategorias = array('categorias' => 
						array('categoria' => array('nome' => 'Terror')),
						array('categoria' => array('nome' => 'Suspense')),
						array('categoria' => array('nome' => 'Noir')),
						array('categoria' => array('nome' => 'Sci-fi'))
						);
						
						foreach ($arrayCategorias as $arrayCategoria){
							$arrayCategoria = $arrayCategoria['categoria'];
							
							$categoria->create();
							$categoria->save(array(
								'nome' => $arrayCategoria['nome']
							));
						};

						break;

						case 'filmes':
							
							//Array utilizado para popular os filmes, a categoria_id é recebida através de paramêtro pelo model categoria
							
							$arrayFilmes = array('filmes' =>
							
							array('filme' => array('categoria_id' => $categoria->findBynome('Noir')['categoria']['id'], 'titulo' =>  'Chinatown', 'capa' =>  'Chinatown.jpg', 'sinopse' => 'O detetive particular Jake Gittes é contratado por uma ricaça para investigar o marido, no que parece ser mais um caso de infidelidade conjugal. Gittes logo descobre que a mulher era uma impostora e encontra a verdadeira Evelyn Mulwray, filha de um dos homens mais poderosos da cidade. O detetive se vê no meio de um perigoso jogo de poder, em uma trama surpreendente que envolve desvio de fornecimento de água, aquisições de terras e pessoas ligadas à Companhia de Água e Energia.' )),
							array('filme' => array('categoria_id' => $categoria->findBynome('Noir')['categoria']['id'], 'titulo' =>  'Instinto Selvagem', 'capa' =>  'Instinto_Selvagem.jpg', 'sinopse' => 'Catherine Tramell é uma escritora extremamente sedutora e principal suspeita de um assassinato. O policial Nick Curran é incumbido de desvendar o crime, mas fica fortemente atraído por Catherine, colocando a própria vida em risco.' )),
							array('filme' => array('categoria_id' => $categoria->findBynome('Noir')['categoria']['id'], 'titulo' =>  'Disque M Para Matar', 'capa' =>  'Disque_M_Para_Matar.jpg', 'sinopse' => 'Um ex-tenista decide matar sua mulher para herdar seu dinheiro e se vingar por ela ter tido um caso com um escritor. Ele chantageia um colega para estrangulá-la, dando a entender que o crime teria sido cometido por um ladrão.' )),
							array('filme' => array('categoria_id' => $categoria->findBynome('Noir')['categoria']['id'], 'titulo' =>  'O Falcao Maltes', 'capa' =>  'O_Falcao_Maltes.jpg', 'sinopse' => 'Um detetive cínico se envolve em uma perigosa missão pela busca de uma estatueta preta do século 16 de valor incalculável. Depois que seu parceiro é assassinado, o detetive enfrenta policiais furiosos, uma mulher sedutora e vilões excêntricos.' )),
							array('filme' => array('categoria_id' => $categoria->findBynome('Sci-fi')['categoria']['id'], 'titulo' =>  'De Volta Para O Futuro', 'capa' =>  'De_Volta_Para_O_Futuro.jpg', 'sinopse' => 'O adolescente Marty McFly é transportado para 1955 quando uma experiência do excêntrico cientista Doc Brown dá errado. Ele viaja pelo tempo em um carro modificado e acaba conhecendo seus pais ainda jovens. O problema é que Marty pode deixar de existir porque ele interferiu na rotina dos pais, que correm o risco de não se apaixonar mais. Para complicar ainda mais a situação, Marty precisa voltar para casa a tempo de salvar o cientista.' )),
							array('filme' => array('categoria_id' => $categoria->findBynome('Sci-fi')['categoria']['id'], 'titulo' =>  'Blade Runner', 'capa' =>  'Blade_Runner.jpg', 'sinopse' => 'No século 21, uma corporação desenvolve clones humanos para serem usados como escravos em colônias fora da Terra, identificados como replicantes. Em 2019, um ex-policial é acionado para caçar um grupo fugitivo vivendo disfarçado em Los Angeles.' )),
							array('filme' => array('categoria_id' => $categoria->findBynome('Sci-fi')['categoria']['id'], 'titulo' =>  'Laranja Mecanica', 'capa' =>  'Laranja_Mecanica.jpg', 'sinopse' => 'O jovem Alex passa as noites com uma gangue de amigos briguentos. Depois que é preso, se submete a uma técnica de modificação de comportamento para poder ganhar sua liberdade.' )),
							array('filme' => array('categoria_id' => $categoria->findBynome('Sci-fi')['categoria']['id'], 'titulo' =>  'Filhos Da Esperança', 'capa' =>  'Filhos_Da_Esperança.jpg', 'sinopse' => 'No ano de 2027, a infertilidade é uma ameaça real para a civilização, e o último humano a nascer em anos acaba de morrer. Frente a um cenário pessimista sobre o futuro, um burocrata desiludido se torna o herói improvável que pode salvar a humanidade. Para isso, ele enfrenta seus próprios demônios e tenta proteger a última esperança do planeta: uma jovem mulher milagrosamente grávida, descoberta pela ativista inteligente com quem fora casado.' )),
							array('filme' => array('categoria_id' => $categoria->findBynome('Suspense')['categoria']['id'], 'titulo' =>  'REC', 'capa' =>  'REC.jpg', 'sinopse' => 'Uma jornalista e seu cinegrafista filmam o surto de uma doença que transforma humanos em canibais perversos.' )),
							array('filme' => array('categoria_id' => $categoria->findBynome('Suspense')['categoria']['id'], 'titulo' =>  'O Iluminado', 'capa' =>  'O_Iluminado.jpg', 'sinopse' => 'Jack Torrance se torna caseiro de inverno do isolado Hotel Overlook, nas montanhas do Colorado, na esperança de curar seu bloqueio de escritor. Ele se instala com a esposa Wendy e o filho Danny, que é atormentando por premonições. Jack não consegue escrever e as visões de Danny se tornam mais perturbadoras. O escritor descobre os segredos sombrios do hotel e começa a se transformar em um maníaco homicida, aterrorizando sua família.' )),
							array('filme' => array('categoria_id' => $categoria->findBynome('Suspense')['categoria']['id'], 'titulo' =>  'O Silencio Dos Inocentes', 'capa' =>  'O_Silencio_Dos_Inocentes.jpg', 'sinopse' => 'Uma jovem e talentosa agente do FBI é aconselhada pelo Dr. Hannibal Lecter, um psiquiatra brilhante e também um psicopata violento e canibal, a fim de conseguir capturar outro assassino.' )),
							array('filme' => array('categoria_id' => $categoria->findBynome('Suspense')['categoria']['id'], 'titulo' =>  'Psicose', 'capa' =>  'Psicose.jpg', 'sinopse' => 'Após roubar 40 mil dólares para se casar com o namorado, uma mulher foge durante uma tempestade e decide passar a noite em um hotel que encontra pelo caminho. Ela conhece o educado e nervoso proprietário do estabelecimento, Norman Bates, um jovem com um interesse em taxidermia e com uma relação conturbada com sua mãe. O que parece ser uma simples estadia no local se torna uma verdadeira noite de terror.' )),
							array('filme' => array('categoria_id' => $categoria->findBynome('Terror')['categoria']['id'], 'titulo' =>  'Nosferatu', 'capa' =>  'Nosferatu.jpg', 'sinopse' => 'O corretor de imóveis Hutter precisa vender um castelo cujo proprietário é o excêntrico conde Graf Orlock. O conde, na verdade, é um vampiro milenar que espalha o terror na região de Bremen, na Alemanha e se interessa por Ellen, a mulher de Hutter.' )),
							array('filme' => array('categoria_id' => $categoria->findBynome('Terror')['categoria']['id'], 'titulo' =>  'A Hora Do Pesadelo', 'capa' =>  'A_Hora_Do_Pesadelo.jpg', 'sinopse' => 'Um grupo de adolescentes tem pesadelos horríveis, em que são atacados por um homem deformado com garras de aço. Ele apenas aparece durante o sono e, para escapar, é preciso acordar. Os crimes vão ocorrendo seguidamente, até que se descobre que o ser misterioso é na verdade Freddy Krueger, um homem que molestou crianças na rua Elm e que foi queimado vivo pela vizinhança. Agora, Krueger pode ter retornado para se vingar daqueles que o mataram, através do sono.' )),
							array('filme' => array('categoria_id' => $categoria->findBynome('Terror')['categoria']['id'], 'titulo' =>  'Brinquedo Assassino', 'capa' =>  'Brinquedo_Assassino.jpg', 'sinopse' => 'Uma mulher compra para seu filho um boneco amaldiçoado por um assassino em série morto dentro uma loja de brinquedos. Pouco antes, ele faz um ritual de vodu com o boneco, que ganha vida e se torna um perigoso psicopata.' )),
							array('filme' => array('categoria_id' => $categoria->findBynome('Terror')['categoria']['id'], 'titulo' =>  'O Massacre da Serra Eletrica', 'capa' =>  'O Massacre da Serra Eletrica.jpg', 'sinopse' => 'No caminho para visitar o túmulo de seu avô, cinco jovens se perdem e mergulham em um pesadelo sem fim quando conhecem uma família de canibais. Os psicopatas atacam os forasteiros utilizando uma variedade de métodos brutais e sádicos.' )),
							
							);

							foreach ($arrayFilmes as $arrayFilme){
								$arrayFilme = $arrayFilme['filme'];
								
								$filme->create();
								$filme->save(array(
									'categoria_id' => $arrayFilme['categoria_id'],
									'titulo' => $arrayFilme['titulo'],
									'capa' => $arrayFilme['capa'],
									'sinopse' => $arrayFilme['sinopse'],
								));
							};

							break;
			}
		}
	}
	
	public $categorias = array(
		'id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'nome' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'key' => 'unique', 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'Categorias_un' => array('column' => 'nome', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_bin', 'engine' => 'InnoDB')
	);

	public $filmes = array(
		'id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'categoria_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'titulo' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'capa' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'sinopse' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'filmes_FK' => array('column' => 'categoria_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_bin', 'engine' => 'InnoDB')
	);

}
