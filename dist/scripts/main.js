"use strict";function NewsletterCtrl(t,e,n){t.alerts=[],t.submit=function(a){t.alerts.push({type:"warning",msg:"Enviando..."});var o=n+"emails/api";e.post(o,{user:a}).then(function(e){t.alerts.push({type:"success",msg:"Obrigado, "+a.name+"! O seu e-mail foi cadastrado com sucesso. Em breve você receberá novidades no seu e-mail."})})["catch"](function(e){console.log(e),t.alerts.push({type:"danger",msg:"Ocorreu um problema ao cadastrar o seu e-mail. Ele pode estar em uso. Entre em contato com o Instituto."})}),t.user={},t.newsletterForm.$setPristine()}}function CertificadoCtrl(t,e,n){t.alerts=[],t.candidate=!1,t.submit=function(a){t.alerts.push({type:"warning",msg:"Enviando..."});var o=n+"candidates/api/search";e.post(o,a).then(function(e){t.candidate=e.data.candidate,t.alerts.push({type:"success",msg:"Sua inscrição foi identificada com sucesso! Verifique os dados abaixo:"})})["catch"](function(e){console.log(e),t.alerts.push({type:"danger",msg:"Ocorreu um problema na consulta. Entre em contato com o Instituto."})}),t.consultaForm.$setPristine()}}function ModalInstanceCtrl(t,e){t.cancel=function(){e.dismiss("cancel")}}function HomeCtrl(t,e,n,a){t.open=function(t,e){a.open({animation:!0,templateUrl:e,controller:"ModalInstanceCtrl",size:t})}}function InscricaoCtrl(t,e,n){t.alerts=[],t.submitForm=function(a){t.alerts.push({type:"warning",msg:"Enviando..."}),e.post(n+"candidates/api",{user:a}).then(function(e){t.record=e.data,t.inscricao={concluido:!0},t.alerts.push({type:"success",msg:"Inscrição Aprovada! Efetue o pagamento no PayPal."})})["catch"](function(e){t.alerts.push({type:"danger",msg:e})}),t.inscricaoForm.$setPristine()}}function ContatoCtrl(t,e,n){t.alerts=[],t.submitForm=function(a){t.alerts.push({type:"warning",msg:"Enviando..."}),e.post(n+"emails/api/contact",{user:a}).then(function(e){t.alerts.push({type:"success",msg:"Seu contato foi enviado com sucesso!"})})["catch"](function(e){t.alerts.push({type:"danger",msg:"Ocorreu um problema ao enviar o seu contato. Tente novamente mais tarde."})}),t.contact={},t.contactForm.$setPristine()}}angular.module("ipvtran.config",[]).constant("apiURL","http://localhost/green/ipvtran/admin/public/"),angular.module("ipvtran",["ui.mask","ui.bootstrap","ipvtran.config"]),angular.module("ipvtran").config(["$compileProvider","$sceProvider",function(t,e){t.debugInfoEnabled(!1),e.enabled(!1)}]),angular.module("ipvtran").controller("HomeCtrl",HomeCtrl),angular.module("ipvtran").controller("ContatoCtrl",ContatoCtrl),angular.module("ipvtran").controller("InscricaoCtrl",InscricaoCtrl),angular.module("ipvtran").controller("ModalInstanceCtrl",ModalInstanceCtrl),angular.module("ipvtran").controller("CertificadoCtrl",CertificadoCtrl),angular.module("ipvtran").controller("NewsletterCtrl",NewsletterCtrl),NewsletterCtrl.$inject=["$scope","$http","apiURL"],CertificadoCtrl.$inject=["$scope","$http","apiURL"],ModalInstanceCtrl.$inject=["$scope","$uibModalInstance"],HomeCtrl.$inject=["$scope","$http","apiURL","$uibModal"],ContatoCtrl.$inject=["$scope","$http","apiURL"],InscricaoCtrl.$inject=["$scope","$http","apiURL"];