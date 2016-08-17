// module.js
angular.module('ipvtran', [
  'ui.mask',
  'ui.bootstrap',
  'ipvtran.config'
]);

angular.module('ipvtran').config(['$compileProvider', '$sceProvider', function ($compileProvider, $sceProvider) {
    $compileProvider.debugInfoEnabled(false);
    $sceProvider.enabled(false);
}]);

// directives.js

// factories.js

// controllers.js
angular.module('ipvtran').controller('HomeCtrl', HomeCtrl);
angular.module('ipvtran').controller('ContatoCtrl', ContatoCtrl);
angular.module('ipvtran').controller('InscricaoCtrl', InscricaoCtrl);
angular.module('ipvtran').controller('ModalInstanceCtrl', ModalInstanceCtrl);

ModalInstanceCtrl.$inject = ['$scope', '$uibModalInstance'];
HomeCtrl.$inject = ['$scope', '$http', 'apiURL', '$uibModal'];
ContatoCtrl.$inject = ['$scope', '$http', 'apiURL'];
InscricaoCtrl.$inject = ['$scope', '$http', 'apiURL'];

function ModalInstanceCtrl($scope, $uibModalInstance) {
  $scope.cancel = function () {
    $uibModalInstance.dismiss('cancel');
  };
};

function HomeCtrl($scope, $http, apiURL, $uibModal) {

  $scope.open = function (size, template) {

    var modalInstance = $uibModal.open({
      animation: true,
      templateUrl: template,
      controller: 'ModalInstanceCtrl',
      size: size
    });

  };

}

function InscricaoCtrl($scope, $http, apiURL) {
  $scope.alerts = [];

  $scope.submitForm = function(record) {

    // waiting alert
    $scope.alerts.push({type: 'warning', msg: 'Enviando...'});

    // AJAX
    $http.post(apiURL + 'records/send', record).then(function(result) {
      $scope.record = result.data;

      // reset model
      $scope.inscricao = {concluido: true};

      $scope.alerts.push({type: 'success', msg: 'Inscrição Aprovada! Efetue o pagamento no PayPal.'});
    }).catch(function(error) {
      $scope.alerts.push({type: 'danger', msg: error});
    });

    // reset form
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