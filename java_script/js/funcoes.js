
class Clientes{
	constructor(code, nome, tele, email){
		this.codigo = code
		this.nome = nome
		this.tele = tele
		this.email = email
	}
}
class BancoDados{
	constructor(){
		let id = localStorage.getItem('id')
		if(id === null){
			localStorage.setItem('id',0)
		}
	}
	getId(){
		let getId = localStorage.getItem('id')
		return parseInt(getId) + 1
	}
	adicionarClientes(ac){
		let id = this.getId()
		localStorage.setItem(id, JSON.stringify(ac))
		localStorage.setItem('id',id)
	}
	recuperarRegistro(){
	let registros = new Array()
	let id = localStorage.getItem('id')
	for(let i = 1; i <= id; i++){
		let despesa = JSON.parse(localStorage.getItem(i))
		if(despesa == null){
			continue
		}
		despesa.id = i

		//adiciona o registro no início
		registros.unshift(despesa)

		//adiciona o registro no final
		//registros.push(despesa)

		//Debug
		//console.log(despesa)
	}
		return registros
	}
	deletar(id){
		localStorage.removeItem(id)
		window.location.reload()
	}
}
let db = new BancoDados()
function Adicionar(){
	let codigo = document.getElementById('txtCodigo')
	let nome = document.getElementById('txtNome')
	let telefone = document.getElementById('txtTelefone')
	let email = document.getElementById('txtEmail')

	let cli = new Clientes(codigo.value, nome.value, telefone.value, email.value)
	db.adicionarClientes(cli)
	window.location.reload()
}
function carregarRegistro(){
	let registro = db.recuperarRegistro()
	let tbCliente = document.getElementById('tbListar')

	registro.forEach(function(r){
		let linha = tbCliente.insertRow()
		linha.insertCell(0).innerHTML = r.codigo
		linha.insertCell(1).innerHTML = r.nome 
		linha.insertCell(2).innerHTML = r.tele
		linha.insertCell(3).innerHTML = r.email
		linha.insertCell(4).innerHTML = `<i class="fas fa-trash" id='trash_${r.id}'></i>`
		let trash = document.getElementById(`trash_${r.id}`)
		trash.style.cursor = 'pointer'
		trash.onclick = function(){
			db.deletar(r.id)
			console.log(r.id)
		}
	})
}