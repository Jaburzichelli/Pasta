programa {
    funcao inicio() {
        inteiro cont = 1
        inteiro S = 0
        inteiro maior = -2147483648  // Menor valor possível para inteiro
        inteiro N
        
        enquanto (cont <= 5) {
            escreva("Digite o ", cont, "o. valor: ")
            leia(N)
            
            se (N > maior) {
                maior = N
            }
            
            S = S + N
            cont = cont + 1
        }
        
        escreva("\nA soma de todos os valores foi ", S)
        escreva("\nO maior valor digitado foi ", maior)
    }
}