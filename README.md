# Web-Programming
> University of Catania 2021/2022 

## Roadmap
| Nome  | Argomento  | Assegnazione  | Scadenza  |
|---|---|---|---|
| [Mini-Homework 1](#Mini-Homework-1)  | Layout sito HTML + CSS  |  24/03/2022 |  02/04/2022 |
|  [Mini-Homework 2](#Mini-Homework-2) | Integrazione JavaScript  | 05/04/2022  | 16/04/2022  |
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
<!--
## Mini-Homework 2
> Integrazione JavaScript

## Mini-Homework 3
> Integrazione REST API JS

## Homework 1
> Sito Completo

## Homework 2
> Porting HomeWork 1 in MVC
-->
