import 'dart:convert';
import 'package:get/get.dart';
import 'package:http/http.dart' as http;
import '../models/Project.dart';
import 'package:gesty/config/config.dart';

class ProjectApiService {
  static Future<List<Project>> getProjects(int companyId) async {
    final queryParams = {'company_id': companyId};
    final response = await http.post(Uri.parse('$base_url/projects/'),
        headers: headers,
        body: jsonEncode(<String, String>{
          'company_id': companyId.toString(),
        }));
    if (response.statusCode == 200) {
      List parsedList = json.decode(response.body);
      return parsedList.map((e) => Project.fromJson(e)).toList();
    } else {
      throw Exception(response.body);
    }
  }
}
