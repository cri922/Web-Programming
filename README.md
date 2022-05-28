# Web-Programming
> University of Catania 2021/2022 - Info: [Perceive Lab](https://perceivelab.github.io/web-programming-course/)

## Roadmap
| Nome  | Argomento  | Assegnazione  | Scadenza  |
|---|---|---|---|
| [Mini-Homework 1](#Mini-Homework-1)  | Layout sito HTML + CSS  |  24/03/2022 |  02/04/2022 |
|  [Mini-Homework 2](#mini-homework-2-quiz-di-personalità) | Integrazione JavaScript  | 05/04/2022  | 16/04/2022  |
| [Mini-Homework 3](#Mini-Homework-3)  | Integrazione REST API JS  |  14/04/2022 |  23/04/2022 |
|  [Homework 1](#Homework-1) |  Sito Completo |  05/05/2022 |  21/05/2022 |
| [Homework 2](#Homework-2)  | Porting HomeWork 1 in MVC  |  26/05/2022 |  18/06/2022 |

## Mini-Homework 1
> Layout sito HTML + CSS

### 1. Aspetto generale
La struttura della pagina dovrà contenere i seguenti elementi:
- una **intestazione (header)** con il titolo della pagina e un’immagine di sfondo;
- un **menù di navigazione**, disposto orizzontalmente in alto o verticalmente a lato, contenente dei link alle altre sezioni del sito (non è necessario che le pagine a cui fanno riferimento i link esistano);
- una sezione di **contenuti**, che rappresenta il corpo principale della pagina. Questa sezione dovrà essere a sua volta divisa in “blocchi” di informazione (da disporre a vostro piacere utilizzando Flexbox), specifiche per il vostro progetto di sito (es., se si tratta di un quotidiano inline, ogni blocco può rappresentare una notizia; se si tratta di un’agenzia di viaggi, ogni blocco può rappresentare un volo o una prenotazione);
- un **footer** che contiene informazioni sulla pagina (tra cui nome, cognome, matricola).

### 2. Misure delle sezioni
Illustrate il vostro progetto nella presentazione in maniera analoga a quanto vedete in questa immagine:
![Misure delle sezioni](https://perceivelab.github.io/web-programming-course/imgs/specs.png)

E’ richiesto l’uso delle seguenti proprietà CSS: margin, padding, height position, border, border-radius, background-color.

### 3. Caratteri, dimensioni e colori
Definite il carattere, il colore e la dimensione del testo in ciascuna delle sezioni della pagina definite in ["Aspetto generale"](#1-aspetto-generale). Se i blocchi di contenuto sono a loro volta divisibili in sotto-parti, usate uno stile diverso per ciascuna.

Per ogni sezione di testo, definite tramite CSS:
- un carattere principale (da Google Fonts) e un carattere di riserva (non da Google Fonts);
- la dimensione del testo;
- lo stile del testo;
- il colore del testo;
- l’allineamento rispetto al contenitore.

E’ richiesto l’uso delle seguenti proprietà CSS: font-weight, font-style, font-family, font-size, color, line-height.

### 4. Immagini
L’intestazione ha un’immagine di sfondo, che non si ripete. Al di sopra dell’immagine vi è un overlay semitrasparente, di colore rgba(0, 0, 0, .3).

La sezioni dei contenuti deve contenere un’immagine per ogni “blocco” di informazione.

### Altre specifiche HTML e CSS
- Non utilizzate librerie aggiuntive (es. Bootstrap).
- **No JavaScript**. Non è necessario usare JavaScript in questo homework.
- **Rispettate la separazione delle responsabilità**. Il vostro codice HTML deve descrivere il contenuto e la struttura della pagina, e il vostro codice CSS deve descrivere l’aspetto della pagina.
- **Mobile web**. Aggiungete opportunamente il codice HTML e CSS necessario affinchè il sito sia fruibile da dispositivi mobili (effettuate i test tramite il device mode di Google Chrome).
- **Minimizzate la ridondanza nel CSS**. Cercate di non avere regole di stile ridondanti, se c’è il modo di sfruttare l’ereditarietà o la specificità.
- **Usate nomi descrittivi**, **indentate il codice**, e in generale seguite le buone norme relativa alla programmazione.

## Mini-Homework 2: quiz di personalità
> Javascript

In questo homework, dovrete creare un quiz di personalità. Ovvero:
- Scegliete un argomento.
- Scegliete tre domande relative all’argomento.
- Per ogni domanda, scegliete nove possibili risposte sotto forma di immagini.
- Ogni risposta corrisponde a una tra nove possibili “personalità”; alla fine del quiz,    mostrate la personalità più frequente (oppure, se le scelte sono tutte diverse, mostrate la personalità corrispondente alla prima scelta).
- Le risposte sulla personalità sono già fornite. Non importa se non sono inerenti alle risposte scelte (ma siete comunque liberi di modificarle a piacimento).

Il codice HTML e CSS fornito contiene già buona parte della soluzione. Dovrete modificare i seguenti file per completare l’homework:
- *index.html*: Buona parte dell’HTML è già scritto, ma dovrete effettuare alcune modifiche per il layout mobile e JavaScript.
- *style.css*: Anche qui, buona parte del CSS è già scritto in provided-style.css, ma dovrete applicare alcune modifiche. **NON** modificate provided-style.css, ma aggiungete le vostre regole in style.css.
- *script.js*: Inserite il codice JavaScript qui.

### Aspetto e comportamento generale  
L’utente deve poter cliccare su ciascun immagine e selezionarla come propria risposta. Cliccare su una risposta ad una domanda per cui è già stata selezionata la risposta deve comportare il deselezionamento della risposta precedente e la seleziona della nuova risposta. Quando tutte e tre le risposte sono selezionate, non deve poter essere più possibile modificarle. A quel punto, viene visualizzata la personalità dell’utente.

### 1. Griglia di scelta

### Struttura della griglia
![Struttura della griglia](https://perceivelab.github.io/web-programming-course/answer_grid.png)
- Per ottenere questo layout potete usare una delle tecniche viste nell’esempio sul tic-tac-toe (ad esempio, impostando *flex-wrap: wrap;* sul contenitore).
- Tra ogni riga c’è uno spazio di *20px*.
  - **Nota**: in Flexbox non viene applicato il margin collapsing.
- Ogni risposta (flex item) ha una larghezza pari a *32.5%*, ed è distribuita su tutto lo spazio a disposizione.
  - **Nota**: la proprietà *width* definisce l’ampiezza del contenuto, senza considerare padding, bordo e margine. Potete usare *calc()* per impostare  correttamente la larghezza; in alternativa, potete anche vedere come funziona la proprietà *box-sizing*. 

### Risposta non selezionata
![Risposta non selected](https://perceivelab.github.io/web-programming-course/answer_box.png)
- Contenitore:
  - Il colore di sfondo è *#f4f4f4*.
  - Il bordo ha spessore *1px* e colore *#dcdcdc*.
  - La larghezza dell’elemento è *32.5%*.
  - Lo spazio tra il bordo e il contenuto dell’elemento è *10px*.
- Immagine di risposta:
  - L’immagine visualizzata deve avere dimensione quadrata.
    - **Suggerimento**: è possibile utilizzare immagini le cui dimensioni originali non siano uguali, ma è più semplice se sono già quadrate in partenza.
- Checkbox:
  - L’immagine per il checkbox non selezionato è *images/unchecked.png*.
  - La larghezza e l’altezza dell’immagine è sono pari a *20px*.
  - **Nota**: Non usate un `<input type="checkbox">`. Utilizzate l’immagine.

### 2. Layout mobile

Avrete bisogno di modificare il CSS e l’HTML per implementare il supporto alla vista da mobile

**Note**: non è necessario caricare la vostra pagina web sul telefono per testare il layout. Utilizzate il device mode di Chrome.

- Se la pagina è visualizzata da mobile:
  - Il livello di zoom della viewport deve essere del *100%*, e la larghezza deve essere pari alla larghezza del dispositivo.
- Se la larghezza dello schermo è minore di *700px*:
  - La larghezza del contenuto della pagina dovrà essere pari a *95%*invece di *700px*.
  - I cerchi gialli nell’header non devono apparire.
- Se la larghezza dello schermo è minore di *500px*:
  - Ogni risposta deve avere larghezza pari al *49%* invece di *32.5%*.

### 3. Funzionamento del quiz 

**Suggerimento**: alcuni aspetti del quiz sono simili al comportamento dell’esempio sul tic-tac-toe.

### Attributi *data*

Dovrete utilizzare gli attributi *data* associati alle possibili risposte (cioè, ai corrispondendi elementi HTML in *index.html*):
- *data-choice-id*: Identifica il risultato del quiz per il quale questa risposta “conta” (i possibili risultati sono definiti in constants.js).
- *data-question-id*: Identifica il numero della domanda: *one*, *two* e *three*.

In Javascript, questi attributi saranno accessibili tramite:
- *element.dataset.choiceId*
- *element.dataset.questionId*

Potete anche selezionare gli elementi HTML corrispondenti a certi valori degli attributi, come in questi esempi:
- *[data-choice-id='blep']*
- *[data-question-id='two']*
---------------------------------------
### Selezionare una risposta
Quando l’utente clicca su una risposta, questa dovrebbe essere visualizzata nel seguente modo:
![Risposta selected](https://perceivelab.github.io/web-programming-course/selected_box.png)
-Per l’elemento selezionato:
  - L’immagine del checkbox deve diventare *images/checked.png*.
  - Il colore di sfondo è *#cfe3ff*.
- Per gli elementi non selezionati (di quella domanda):
  - Devono essere resi semi-trasparenti (opacità *0.6*).
    - Suggerimento: potete utilizzare un overlay per implementare la semitrasparenza; tuttavia, dato che tutto il contenuto del *div* che contiene la risposta deve essere resto semi-trasparente, potete anche utilizzare la proprieta CSS *opacity*.

### Modificare una risposta

Se l’utente non ha ancora completato il quiz (cioè, se almeno una risposta non è stata selezionata), deve poter modificare la propria risposta cliccando su un’altra immagine.

Dopo che l’utente ha risposto a tutte le domande, le risposte non devono poter essere più modificate, finchè l’utente non clicchi “Ricomincia il quiz” o aggiorni la pagina.

### Completamento del quiz

Dopo che l’utente ha risposta a tutte le domande, il quiz è completo.

I risultati sulla personalità devono apparire in fondo alla pagina. Le informazioni da mostrare sono definite all’interno di *constants.js*.

Di seguito, le specifiche di come il risultato deve essere visualizzato:
![Result box](https://perceivelab.github.io/web-programming-course/results_box.png)
- Bottone:
  - Il colore di sfondo è *#cecece*.
  - Quando l’utente muove il mouse su di esso (*hover*), il colore diventa *#e0e0e0*.

### Risultato del quiz
Il valore di *data-choice-id* di ogni risposta è mappato ad uno dei possibili risultati definiti da *RESULTS_MAP*, all’interno di *constants.js*. Potete accedere a *RESULTS_MAP* da dentro *script.j*s* perchè *constants.js* è incluso prima di *script.js* in *index.html*.

Quando il quiz è completo, analizzate i valori di *data-choice-id* di ogni risposta. Ad esempio, se i valori sono *blep*, *sleepy* e *blep*, dovrete visualizzare il titolo e i contenuti della personalità descritta in *RESULTS_MAP['blep']*.

In caso di pareggio, cioè se l’utente sceglie valori unici per *data-choice-id*, come risultato del quiz viene utilizzata la risposta alla prima domanda. Ad esempio, se i valori selezionati sono, in ordine, *burger*, *nerd* e *shy*, dovrete visualizzare i titoli e i contenuti della personalità descritta in *RESULTS_MAP['burger']*.

### Ricominciare il quiz
Se l’utente clicca sul pulsante “Ricomincia il quiz”, la pagina deve tornare allo stato iniziale:
- Le risposte scelte devono tornare al loro aspetto originario.
- Il risultato sulla personalità deve scomparire.
- Le risposte devono poter essere nuovamente selezionabili.
- La pagina deve sembrare e comportarsi come se aveste ricaricato la pagina (senza aver effettivamente ricaricato la pagina).
<!--
## Mini-Homework 3
> Integrazione REST API JS

## Homework 1
> Sito Completo

Lo scopo dell’homework è quello di realizzare un sito web (3-5 pagine distinte) che integri quanto visto finora nel corso (HTML, CSS, JavaScript, PHP e interazione con DBMS), estendendo la tematica sviluppata nei precedenti mini-homework.

In particolare, è richiesto l’utilizzo di API REST sia da PHP (ad esempio, per servizi che richiedono l’utilizzo di credenziali segrete) che da JavaScript (accedendo tramite fetch a dati JSON forniti dal vostro sito stesso).

### Funzionalità richieste
- Meccanismo di registrazione, login, logout degli utenti, con opportuna validazione dei dati (sia lato client che lato server). Dal lato client, le minime validazioni richieste sono: username già in uso, password con una struttura ben definita (ad esempio, vincoli sulla lunghezza minima, sulla presenza di maiuscole, numeri, simboli, ecc.).

- I “blocchi di contenuto” da visualizzare nella home page devono essere caricati accedendo tramite API REST a pagine PHP del vostro sito.

- La home page deve supportare meccanismi di interazione con l’utente tramite JavaScript e richieste asincrone (ad esempio, “like” a elementi, commenti, chat, inserimento in un carrello, salvataggio tra preferiti, ricerca di contenuti, e così via).

- Le pagine oltre la home page sono a vostra scelta, col vincolo che il caricamento di contenuti debba sempre avvenire tramite API REST.

- Il sito deve prevedere la possibilità di ricercare contenuti tramite API REST oltre che inserire nel database alcuni dei contenuti scelti dall’utente.

- **In generale, sarà oggetto di valutazione l’uso di richieste asincrone tramite JavaScript al posto di ricaricamenti della pagina.**

## Homework 2
> Porting HomeWork 1 in MVC
-->
