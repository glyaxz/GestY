import 'package:flutter/foundation.dart';
import 'package:gesty/src/models/Company.dart';
import 'package:provider/provider.dart';

class CompanyProvider with ChangeNotifier {
  //Es el punto medio entre el consumer y el servicio, el cual recoge del servicio y parsea la información

  final List<Company> _items = [];

  void addCompany(Company company) {
    _items.add(company);
    notifyListeners();
  }

  void removeAllCompanies() {
    _items.clear();
    notifyListeners();
  }
}
