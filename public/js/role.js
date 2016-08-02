myApp.controller('roleCtrl', ['$scope', '$http', '$sce', function ($scope, $http, $sce) {
        $scope.addRole = function (Role) {
            var dataString = $('#addProfile').serializeArray();
            var options = {
                url: 'profiles/createRolePopup',
                type: 'POST',
                dataType: 'json',
                data: dataString,
                success: function (response) {
                    if (response.status == 'true') {

                    } else {

                    }

                }
            }

        }
    }]);


