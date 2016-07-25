// module.js
angular.module('ipvtran', [
  'ui.mask',
  'ui.bootstrap',
  'ipvtran.config'
]);

angular.module('ipvtran').config(['$compileProvider', function ($compileProvider) {
    // $compileProvider.debugInfoEnabled(false);
}]);

// directives.js

// factories.js

// controllers.js
angular.module('ipvtran').controller('ContatoCtrl', ContatoCtrl);
angular.module('ipvtran').controller('InscricaoCtrl', InscricaoCtrl);

ContatoCtrl.$inject = ['$scope', '$http', 'apiURL'];
InscricaoCtrl.$inject = ['$scope', '$http', 'apiURL'];

function InscricaoCtrl($scope, $http, apiURL) {
  $scope.alerts = [];

  $scope.submitForm = function(inscricao) {

    // waiting alert
    $scope.alerts.push({type: 'warning', msg: 'Enviando...'});
    
    // reset form and model
    $scope.inscricao = {};
    $scope.inscricaoForm.$setPristine();
  }
}

function ContatoCtrl($scope, $http, apiURL) {
  $scope.alerts = [];

  $scope.submitForm = function(contact) {

    // waiting alert
    $scope.alerts.push({type: 'warning', msg: 'Enviando...'});
    
    $http.post(apiURL + 'send', contact).then(function(result) {
      $scope.alerts.push({type: 'success', msg: 'Seu contato foi enviado com sucesso!'});
    }).catch(function(error) {
      $scope.alerts.push({type: 'danger', msg: 'Ocorreu um problema ao enviar o seu contato. Tente novamente mais tarde.'});
    });
  
    // reset form and model
    $scope.contact = {};
    $scope.contactForm.$setPristine();
  }
}