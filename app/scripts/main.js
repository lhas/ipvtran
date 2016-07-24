// module.js
angular.module('ipvtran', [
  'ui.mask',
  'ui.bootstrap'
]);

angular.module('ipvtran').config(['$compileProvider', function ($compileProvider) {
    // $compileProvider.debugInfoEnabled(false);
}]);

// directives.js

// factories.js

// controllers.js
angular.module('ipvtran').controller('ContatoCtrl', ContatoCtrl);

ContatoCtrl.$inject = ['$scope', '$http'];

function ContatoCtrl($scope, $http) {
  $scope.alerts = [];

  $scope.submitForm = function(contact) {

    // waiting alert
    $scope.alerts.push({type: 'warning', msg: 'Enviando...'});
    
    $http.post("http://localhost/ipvtran/admin/public/send", contact).then(function(result) {
      $scope.alerts.push({type: 'success', msg: 'Seu contato foi enviado com sucesso!'});
    }).catch(function(error) {
      $scope.alerts.push({type: 'danger', msg: 'Ocorreu um problema ao enviar o seu contato. Tente novamente mais tarde.'});
    });
  
    // reset form and model
    $scope.contact = {};
    $scope.contactForm.$setPristine();
  }
}