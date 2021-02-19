# Route Strategy
Biblioteca de interfaces para unificar a forma como usar estrategias de routiamento, assim, nossa aplicação respeitará o **principio do aberto e fechado** (OCP).

Dessa forma, a aplicação que utilizar essa biblioteca ficará:
- 🔓 aberto para novas implementações de sistemas de routiamento
- 🔒 está fechado para modificações, tornando mais facil a migração para outros frameworks de routiamento.