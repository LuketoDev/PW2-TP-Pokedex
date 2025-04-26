-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 26-04-2025 a las 08:38:11
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pokedex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `username`, `password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pokemon`
--

CREATE TABLE `pokemon` (
  `id` int(11) NOT NULL,
  `identificador_numerico` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pokemon`
--

INSERT INTO `pokemon` (`id`, `identificador_numerico`, `nombre`, `tipo`, `imagen`, `descripcion`) VALUES
(1, 1, 'Bulbasaur', 'PLANTA', 'imagenes/pokemon/bulbasaur.png', 'Bulbasaur es un Pokémon cuadrúpedo de color verde y manchas más oscuras de formas geométricas. Su cabeza representa cerca de un tercio de su cuerpo. En su frente se ubican tres manchas que pueden cambiar dependiendo del ejemplar. Tiene orejas pequeñas y puntiagudas. Sus ojos son grandes y de color rojo. Las patas son cortas con tres garras cada una. Este Pokémon tiene plantado un bulbo en el lomo desde que nace. Esta semilla crece y se desarrolla a lo largo del ciclo de vida de Bulbasaur a medida que suceden sus evoluciones. El bulbo absorbe y almacena la energía solar que Bulbasaur necesita para crecer. Dicen que cuanta más luz consuma la semilla, más olor producirá cuando se abra. Por otro lado, gracias a los nutrientes que el bulbo almacena, puede pasar varios días sin comer. El bulbo de Bulbasaur le ayuda a defenderse de los enemigos y desde él puede disparar ataques tales como rayo solar y drenadoras entre otros. No es muy raro encontrarlo en jardines y zonas cercanas a fuentes de agua. También suele encontrarse en zonas boscosas profundas. Se los puede atraer con el aroma de las flores. Bulbasaur es omnívoro, aunque si no encuentra comida, su bulbo absorbe la energía del sol para hacer la fotosíntesis y le permite pasar días sin comer. Dicen que en las mañanas su bulbo se abre y atrapa al primer Pokémon que caiga por su irresistible olor.'),
(2, 4, 'Charmander', 'FUEGO', 'imagenes/pokemon/charmander.png', 'Charmander es un pequeño lagarto bípedo. Sus características de fuego son resaltadas por su color de piel anaranjado y su cola con la punta envuelta en llamas. Charmander, como sus evoluciones Charmeleon y Charizard, tiene una pequeña llama en la punta de su cola. La intensidad con la que esta arde es un indicador del estado físico y emocional de este Pokémon. Cuando la intensidad de la llama está baja, su salud puede estar en riesgo. Cuando arde con normalidad, Charmander está saludable y alegre. Cuando la llama de su cola arde con más intensidad, es porque está enfadado, y si la llama de su cola se vuelve azul es porque encontró un rival fuerte y digno de él. Si la llama desaparece o se apaga, moriría. Charmander no muere necesariamente si cae al agua, pero permanecer en ella por más de unos minutos puede ser fatal. En la lluvia no le pasan grandes cambios ni se debilita, pero las gotas de agua que caen en él provocan vapor y poco a poco van apagando su llama. Los ejemplares de Charmander son escasos en el hábitat salvaje. Los pocos que quedan eligen preferentemente lugares cálidos para vivir, como las cercanías de volcanes. El hábitat de Charmander es la montaña. Vive en lugares rocosos y aledaños a lugares muy calurosos, pero cabe destacar que no vive en zonas de gran altura. También viven en montañas escarpadas, en manadas junto con Charmeleon y Charizard. Su dieta es la dieta omnívora habitual de un Pokémon. Suelen cazar y recolectar en pequeños grupos, y llama a los demás si encuentran cualquier tipo de alimento.'),
(3, 7, 'Squirtle', 'AGUA', 'imagenes/pokemon/squirtle.png', 'Squirtle es una de las especies más difíciles de encontrar. Habita tanto aguas dulces como marinas, preferiblemente zonas bastante profundas. Son pequeñas tortugas color celeste con caparazones color café; o rojas en algunos casos, con una cola enrollada que los distingue. Poco después de nacer, sus caparazones se endurecen y se hacen más resistentes a los ataques; muchos objetos rebotarán en ella.\r\nLa forma redonda de su caparazón y las figuras en su superficie hacen que Squirtle tenga una muy buena forma hidrodinámica, lo que le da mayor velocidad al nadar. Cuando se siente atacado, Squirtle esconde completamente su cuerpo en el interior de su caparazón, lo que hace que resulte imposible atacarle, además cuando esta dentro de su caparazón puede atacar escupiendo agua por todos los agujeros del caparazón. Es capaz de escupir agua por su boca con gran fuerza, ya sea para atacar o intimidar. Squirtle es relativamente fácil de criar gracias a su destacado carácter alegre y simpático, aunque su relativa lentitud en tierra firme y la dificultad para equilibrar sus ataques acuáticos con ataques de otros tipos pueden crear algunos problemas al entrenador. Squirtle normalmente come algas, pero también le gustan otros alimentos como la fruta. En tierra firme, a Squirtle le puede resultar un poco más difícil andar, pero le resulta mas fácil ir a cuatro patas.1 El hábitat de Squirtle es el agua dulce: este Pokémon habita en lugares como estanques, ríos y lagos. También puede vivir en mares. Se encuentran en islas junto con sus evoluciones.'),
(4, 25, 'Pikachu', 'ELECTRICO', 'imagenes/pokemon/pikachu.png', 'Pikachu almacena una gran cantidad de electricidad en sus mejillas. Estas parecen cargarse eléctricamente durante la noche mientras duerme. Las mejillas de Pikachu también pueden ser recargadas mediante una descarga eléctrica, como se ha podido observar en algunos episodios del anime. A veces suelta unas pequeñas descargas cuando se acaba de despertar. Las mejillas son las que generan electricidad, pero esta es conducida y descargada por la punta de su cola produciendo descargas eléctricas, que aumentan de poder dependiendo del estado de ánimo de Pikachu. Muchas veces, en las tormentas se juntan y absorben electricidad de los relámpagos.'),
(5, 10, 'Caterpie', 'PLANTA', 'imagenes/pokemon/caterpie.png', 'Caterpie podría estar basado en la oruga de la mariposa Papilio canadensis. Tiene pequeños pies con ventosas en sus extremos que le permiten trepar árboles y paredes sin mayor esfuerzo. Es un Pokémon bastante extendido, sobre todo por la zona de Kanto. Caterpie es un Pokémon relativamente débil, y como tal ha desarrollado adaptaciones para su supervivencia. Su característica más notable son sus brillantes antenas color rojo sobre su cabeza. Estas, junto con sus grandes ojos, ayudan a ahuyentar depredadores. Este Pokémon es capaz de producir una sustancia que desprende un hedor de su antena. Comparte muchas características físicas con Wurmple y Weedle, teniendo además, una línea evolutiva muy similar. Además su cuerpo termina en un signo de exclamación, el cual es completado por los círculos amarillos que tiene a los costados. Las ventosas de sus patas le permiten escalar cualquier tipo de superficie e incluso caminar por los techos. Además es capaz de emitir una terrible peste a través de sus antenas cuando se siente amenazado. Los Caterpie crecen muy rápidamente, por lo que come vorazmente para llenar sus reservas de energía. Una vez hayan finalizado su etapa como larva, él mismo se enredará en su propia saliva solidificada, entrando a una nueva etapa. A pesar de ser un Pokémon idóneo para principiantes, muchos los repelen, por el hecho de ser un Pokémon tipo bicho. Caterpie es un Pokémon pacífico y no demasiado fuerte, habitualmente no se ve implicado en enfrentamientos con otros Pokémon de su hábitat. Puede encontrarse en bosques poblados de numerosos árboles donde hace sus nidos. Siempre se le ve junto a un grupo de Caterpie o acompañado de otro Pokémon insecto, rara vez se encuentra solo.'),
(6, 37, 'Vulpix', 'FUEGO', 'imagenes/pokemon/vulpix.png', 'Cuando nacen tiene una cola, la cual es blanca como su evolución Ninetales. Al crecer esta se torna rojo oscuro como el resto del cuerpo, se divide en seis y se convierte en bellos rizos. De tamaño pequeño y de patas cortas, aún así resulta sorprendentemente ágil, dentro de su cuerpo arde una llama que nunca se apaga. Durante el día cuando aumenta la temperatura, éste Pokémon expira fuego de su boca para prevenir que su cuerpo no se torne demasiado caliente. Su suave pelaje es corto excepto en el flequillo y en sus seis colas. Su color de pelo es blanco en el vientre, anaranjado en las colas y el flequillo, oscuro en las patas y marrón en el resto del cuerpo. Sus ojos son grises y rasgados y poseen una buena y aguda vista. Vulpix es inmune a temperaturas inferiores a 350 grados. Este Pokémon posee gran altanería gracias a su pelaje y a su forma elegante de atacar, pero es muy leal a su entrenador.\r\n\r\n'),
(7, 60, 'Poliwag', 'AGUA', 'imagenes/pokemon/poliwag.png', 'Poliwag es un Pokémon de tipo agua. Parece estar basado en el \"renacuajo de Costa Rica\". La espiral que posee en su vientre corre hacia la derecha. Su cola plana le permite dar fuertes bofetadas rápidamente. Tiene la clasificación de Pokémon renacuajo, su piel es tan elástica y fina que resulta posible ver sus órganos internos. Se alimenta filtrando el agua. A diferencia de Poliwhirl y Poliwrath tiene una pequeña boca.'),
(8, 81, 'Magnemite', 'ELECTRICO', 'imagenes/pokemon/magnemite.png', 'Magnemite es un Pokémon de carácter inorgánico. Su cuerpo está construido de materiales superconductores de campos magnéticos así como almacenes de energía como el Litio, el Cadmio y el Níquel. Suelen ser Pokémon muy tranquilos, acercándose a la gente sin ningún problema, aunque si se llegan a poner nerviosos atacan con supersónico u onda trueno, en casos extremos llegan a utilizar rayo o electrocañón. Tienen un gran potencial a la hora de batalla, ya que luchan con todas sus fuerzas hasta ganar. Ademas suelen ser Pokémon muy leales con su Entrenador, si se entrenan de manera correcta. Magnemite es el Pokémon predilecto de los científicos Pokémon, ya que es todo un enigma físico. Se mantiene en el aire gracias a la habilidad de anular campos magnéticos, los cuales mediante la antigravitación lo mantienen suspendido en el aire. Es atraído fuertemente por campos eléctricos contrarios a los de él. Al encontrarse enfermo no puede controlar su energía y la libera en grandes cantidades. Suele tener un gran parecido con Beldum y Bronzor, ya que estos Pokémon son igual del tipo acero y ademas generan ondas electromagnéticas para mantenerse en el aire flotando. Magnemite tiene un solido núcleo de hierro, níquel y cobalto, los tres metales ferromagnéticos. Posee dos grandes imanes los cuales se mantienen a cierta distancia del núcleo logrando un movimiento libre de ellos, a través de sus imanes puede descargar grandes cantidades de energía eléctrica contra sus enemigos. Además tiene tres pequeños tornillos, uno en el centro de la cabeza hacia arriba, el cual le sirve como pararrayos, de manera que puede cargarse si hay tormentas eléctricas y dos pequeños en la parte inferior de su esférico cuerpo. Pesan alrededor de 6 kilogramos, aunque se han encontrado especímenes de hasta 10 kg, y mide aproximadamente 30 cm.\r\n\r\n'),
(9, 152, 'Chikorita', 'PLANTA', 'imagenes/pokemon/chikorita.png', 'Este dócil Pokémon hoja, de color verde claro, se alimenta con rayos solares mediante la fotosíntesis que ocurre cuando éstos impactan en su cuerpo o en su hoja. Esta hoja tiene propósitos múltiples: sirve tanto para detectar la temperatura en la atmósfera y la humedad, lo que le ayuda a encontrar lugares cálidos; como de adorno que resalta el hecho de que pertenece al tipo planta. Por otro lado, puede emanar un suave y agradable aroma que procede de su hoja que calma a quienes tenga alrededor. Esto puede ser usado como una ventaja en batalla.\r\nParece estar basado en una cría de dinosaurio o una lagartija. Además, posee una especie de collar alrededor de su cuello, compuesto de pequeñas semillas. Estas empiezan a crecer mientras evolucionan, pasando a semillas a punto de germinar hasta convertirse en pétalos, similar a lo que le pasa a Bulbasaur al evolucionar. Sus ojos son de color rojo y al evolucionar a Meganium, se vuelven amarillos.\r\nPese a su carácter normalmente algo asustadizo y tímido; si se les reta a un combate es muy probable que lo acepten, y si la oportunidad lo amerita, darán muestras de valentía. Aunque este tipo de valentía solo lo demuestran Chikorita de una montaña específica. Chikorita coge cariño fácilmente a su entrenador, y a veces puede ser un poco celoso.'),
(10, 155, 'Cyndaquil', 'FUEGO', 'imagenes/pokemon/cyndaquil.png', 'Cyndaquil es un Pokémon tímido y pequeño; que recuerda a un equidna. Su piel es azulada en la parte superior de su cuerpo, pero un color crema en la parte inferior.\r\nUna de sus características más notorias es que puede encender su llama a voluntad, a diferencia de otros Pokémon de tipo fuego con llamas en su cuerpo como Charmander (con sus respectivas evoluciones) y Magmar. Las llamas de este Pokémon salen de cuatro pequeños orificios en su espalda, que se encienden cuando está a punto de pelear. Al igual que muchos Pokémon de tipo fuego, el tamaño de su llama depende del estado en que este se encuentre: si está contento, eufórico o furioso, su llama será más grande, y si está enfermo o deprimido, el tamaño del fuego sobre su lomo se verá muy reducido. Cyndaquil utiliza el fuego de su lomo para defenderse en caso de que algún depredador se abalance sobre él. Cuando está enfadado, las llamas de su lomo salen con fuerza, pero si está cansado solo consigue echar chispas.\r\nUna característica graciosa de este Pokémon es que siempre tiene los ojos cerrados. Aún así. puede ver por donde camina, al igual que Skitty, Swinub, Abra o Uxie, entre otros. Suele esconderse en cuevas o entre la vegetación. Normalmente se esconde de otros Pokémon o humanos, debido a su naturaleza tímida. A menudo se queda acurrucado o enroscado en forma de una pequeña bola.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identificador_numerico` (`identificador_numerico`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
