import 'package:gesty/models/Company.dart';
import 'package:gesty/services/company_api_service.dart';
import 'package:get/get.dart';

class CompanyProvider extends GetxController {
  //Es el punto medio entre el consumer y el servicio, el cual recoge del servicio y parsea la información

  bool _loading = false;
  static int columns = 2;
  bool get loading => _loading;
  final RxList<Company> _companies = <Company>[].obs;
  List<Company> get companies => _companies;

  @override
  void onInit() {
    getCompanies();
    super.onInit();
  }

  void changeLoading(bool newState){
    _loading = newState;
    update();
  }

  void setCompanies(List<Company> newList){
    _companies.clear();
    _companies.addAll(newList);
    update();
  }

  Future<void> getCompanies() async {
    changeLoading(true);
    List<Company> aux = await CompanyApiService.getCompanies();
    setCompanies(aux);
    changeLoading(false);
    update();
  }
}
