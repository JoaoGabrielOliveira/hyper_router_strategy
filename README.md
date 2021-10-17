# Route Strategy
Biblioteca de interfaces para unificar a forma como usar estrategias de routiamento, assim, nossa aplicação respeitará o **principio do aberto e fechado** (OCP).

Dessa forma, a aplicação que utilizar essa biblioteca ficará:
- 🔓 aberto para novas implementações de sistemas de routiamento
- 🔒 está fechado para modificações, tornando mais facil a migração para outros frameworks de routiamento.

## Route Parser
**Route Parser** converte informações de um arquivo para o PHP. Para tal feito, foi usado o _design pattern_ Strategy.
A classe contexto do Route Parser é chamada de **RoutesFile**

## AbstractRouter
