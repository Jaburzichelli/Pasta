programa {
  funcao inicio() {

    procedimento Soma(var A, var B: inteiro)
inicio
    A <- A + 1
    B <- B + 2
    escreval("A soma vale ", A + B)
fimprocedimento

inicio
    X <- 4
    Y <- 8
    Soma(X, Y)
    escreval("Valores após Soma: ", X, " e ", Y)
    
    
  }
}
