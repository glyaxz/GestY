import 'dart:convert';
import 'dart:developer';
import 'package:http/http.dart' as http;
import '../models/Company.dart';

class CompanyApiService {
  final _api_key = "3sJak0orV9ysH0GBV2PZBDPqiIBroEZI";
  final _baseUrl = "https://gesty.devf6.es/api";

  //Obtiene los datos y los envia al controller que se encarga de parsear los datos

  Future<List<Company>> getCompanies() async {
    final urlCompanies = '${_baseUrl}/get-companies';
    Map<String, String> requestHeaders = {
      'Content-type': 'application/json',
      'Accept': 'application/json',
      'Authorization': _api_key
    };
    final response =
        await http.get(Uri.parse(urlCompanies), headers: requestHeaders);

    if (response.statusCode == 200) {
      List parsedList = json.decode(response.body);
      //print(parsedList);
      return parsedList.map((e) => Company.fromJson(e)).toList();
    } else {
      throw Exception(response.body);
    }
  }
}
