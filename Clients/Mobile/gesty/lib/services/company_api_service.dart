import 'dart:convert';
import 'package:http/http.dart' as http;
import '../models/Company.dart';
import 'package:gesty/config/config.dart';

class CompanyApiService {
  static Future<List<Company>> getCompanies() async {
    final response =
        await http.post(Uri.parse('$base_url/companies'), headers: headers);
    if (response.statusCode == 200) {
      List parsedList = json.decode(response.body);
      return parsedList.map((e) => Company.fromJson(e)).toList();
    } else {
      throw Exception(response.body);
    }
  }
}
