import 'package:flutter/material.dart';
import 'package:gesty/src/models/Company.dart';
import 'package:gesty/src/resources/company_api_service.dart';
import 'package:get/get.dart';
import 'package:provider/provider.dart';

class CompanyList extends StatefulWidget {
  const CompanyList({Key? key}) : super(key: key);

  @override
  State<CompanyList> createState() => _CompanyListState();
}

class _CompanyListState extends State<CompanyList> {
  late CompanyApiService api;

  @override
  void initState() {
    super.initState();
    api = new CompanyApiService();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Empresas'),
      ),
    );
  }

  Widget buildCompanyGrid(AsyncSnapshot<Company> snapshot) {
    return GridView.builder(
        gridDelegate: SliverGridDelegateWithFixedCrossAxisCount(
            crossAxisCount: 3, childAspectRatio: 0.7),
        itemBuilder: (BuildContext context, int index) {
          return GridTile(child: Text('${snapshot.data}'));
        });
  }

  Widget? buildCompanies() {
    /*
    return FutureBuilder<Company>(
        future: api.getCompanies(),
        builder: (context, snapshot) {
          if(snapshot.hasData){
            return buildCompanyGrid(snapshot);
          }else if(snapshot.hasError){
            return Text(snapshot.error.toString());
          }
          return Center(
            child: CircularProgressIndicator(),
          );
        }
    );
    */
    //El consumer es el encargado de pintar en pantalla
    return Consumer<Company>(
      builder: (context, company, child) {
        return Text('$company');
      },
    );
  }

  debugging(Object obj) {
    print(obj);
  }
}
