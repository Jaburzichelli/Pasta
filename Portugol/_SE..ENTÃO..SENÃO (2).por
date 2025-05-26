programa
{
    funcao inicio()
    {
        inteiro N, S, Cont
        caractere resp

        S = 0
        Cont = 1
        resp = "S"

        enquanto (resp = "S") faca
            escreva("Digite o ", Cont, "o. valor ==> ")
            leia(N)

            S = S + N
            Cont = Cont + 1

            escreva("Você quer continuar? [S/N] ")
            leia(resp)
        fimenquanto

        escreval("A soma de todos os valores digitados é ", S)
    }
}